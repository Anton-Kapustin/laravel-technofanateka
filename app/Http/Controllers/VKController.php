<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VKController extends Controller {

  public function push_message_from_vk(Request $request)
  {
    $array_news = $this->parce_request_from_vk($request);
    $this->add_post_to_db($array_news);
    return 'OK';
  }

  public function parce_request_from_vk($request)
  {
    try
    {
      $array_news = array();
          $array_with_updates = '';
          if (isset($request->updates))
          {
            $array_news = $this->parse_multiple_updates($request);
          } elseif ( (isset($request->type)) || (isset($request->object)) )
          {
            $update_type = $request->type;
            if ($update_type == 'wall_post_new')
            {
              $array_with_update = $request->object;
              $date = $this->get_element_from_array('date', $array_with_update);
              $news = $this->get_element_from_array('text', $array_with_update);
              if (strpos($news, '#сборкиПК') === false)
              {
                $attachments_with_photos = $this->get_element_from_array('attachments', $array_with_update);
                if($date || $news)
                {
                  $title = $this->parse_title_from_post($news);
                  $news = str_replace($title, "", $news);
                  $array_urls_first_photo = $attachments_with_photos[0];
                  $max_width = $this->get_max_width_from_array($array_urls_first_photo);
                  $photo_url = $this->get_url_with_max_width($max_width, $array_urls_first_photo);
                  $file_name = '';
                  // print_r($photo_url);
                  if (strpos($photo_url, "https:") !== false)
                  {
                    $file_name = $this->get_filename_from_url($photo_url);
                    
                  } 
                  else
                  {
                    $file_name = basename($photo_url);
                  }
                  file_put_contents('res/news/'.$file_name,file_get_contents($photo_url));
                  $array_news[$date]['text'] = $this->delete_blank_space_in_text($news);
                  $array_news[$date]['title'] = $title;
                  $array_news[$date]['photo'] = $file_name;
                }
              }

            }
          }
    return $array_news;
    }
    catch (Exception $error)
    {
      print_r($error);
      return view('error', compact('error'));
    }
    
  }


  public function get_filename_from_url($url)
  {
    $url_basename = basename($url);
    preg_match('/^.+\.jpg/', $url_basename, $filename);
    return $filename[0];
  }

  public function get_url_with_max_width($max_width, $array_with_photo_urls)
  {
    $photo_url = '';
    if($array_with_photo_urls)
    {
        if (isset($array_with_photo_urls['photo']['sizes']))
        {
          $array_width_url = $array_with_photo_urls['photo']['sizes'];
          if($array_width_url)
          {
            foreach ($array_width_url as $photo_url_width)
            {
              $width = $this->get_element_from_array('width', $photo_url_width);
              if ($width == $max_width)
              {
                $photo_url = $this->get_element_from_array('url', $photo_url_width);
              }
            }
          }
        }
      }
      return $photo_url;
    }



  public function get_max_width_from_array($array_with_photos)
  {
    $array_width = array();
    $max_width = '';
      if (isset($array_with_photos['photo']['sizes']))
      {
        $array_photos_width = array();
        $array_photo_sizes = $array_with_photos['photo']['sizes'];
        foreach ($array_photo_sizes as $array_width_url) {
          $width = $this->get_element_from_array('width', $array_width_url);
          $array_photos_width[] = (int)$width;
        }
        $max_width = max($array_photos_width);
      }
    return $max_width;
  }

  public function get_element_from_array($key, $array_with_update)
  {
    $element = '';
    if (isset($array_with_update[$key]))
    {
      $element = $array_with_update[$key];
    }
    return $element;
  }

  public function parse_multiple_updates($array_with_updates)
  {
    $array_news = array();
    $array_with_updates = '';
    $array_with_updates = $array_with_updates->updates;
    foreach ($array_with_updates as $array_with_update) {
      if($array_with_update)
      {
        if((isset($array_with_update['type'])) || (isset($array_with_update['object'])))
        {
          $date = '';
          $news = '';
          if($array_with_update['type'] == 'wall_post_new')
          {
            $array_with_post = $array_with_update['object'];
            if(isset($array_with_post['text']))
            {

              $news = $array_with_post['text'];
              print_r($news);
              if(isset($array_with_post['date']))
              {
                $date = $array_with_post['date'];

              } else
              {
                $date = date('Y-m-d H:i:s');
              }
              $array_news[$date] = $news;
            }
          }
        }
      }
    }
    return $array_news;
  }

  public function parse_title_from_post($news)
  {
    $title = '';
    $match_title = preg_split("/\n/", $news);
    try {
      $title = $match_title[0];
    } catch (\Throwable $e) {
    }
    return $title;
  }

  public function delete_blank_space_in_text($text)
  {
    $news_text = preg_replace("/\n\n+/u", "\x0a", $text);
    $news_text = preg_replace("/\s\s+/u", ' ', $news_text);

    return $news_text;
  }

  public function add_post_to_db($array_news)
  {
    foreach ($array_news as $partOfNews) {
      if ($partOfNews)
      {
        $news = new News;
        $news->user_id = 7;
        $news->title = $partOfNews['title'];
        $news->body = $partOfNews['text'];
        $news->title_image = $partOfNews['photo'];
        $news->published = 1;
        $news->save();
      }
    }


  }

}
