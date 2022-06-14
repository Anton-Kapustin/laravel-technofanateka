<?php

namespace App\Http\Controllers;
use app\User;
use Illuminate\Http\Request;
use App\Models\UsersPosts;
use App\Models\TelegramLogs;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AdminPanelController;


class TelegramController extends Controller {

  public $telegram_bot_api = 'https://api.telegram.org/bot1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/';

  public function getWebhookInfo()
  {
    $webhook_status = '';
    $telegram_bot_api_get_webhook = 'https://api.telegram.org/bot1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/getWebhookInfo';
    $response = Http::get($telegram_bot_api_get_webhook);
    $data = $response->json();
    $url_for_webhook = $data['result']['url'];
    if ($url_for_webhook)
    {
      $webhook_status = 'Webhook is setting up';
    } else
    {
      $webhook_status = 'No webhooks';
    }
    return $webhook_status;
  }

  public function setWebhook()
  {
    $string_webhook_set = 'Webhook is already set';
    $webhook_status = '';
    $telegram_bot_api_webhook = 'https://api.telegram.org/bot1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/setWebhook?url=';
    $site_url_for_webhook = 'https://technofanateka.ru/1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/webhook';
    $response = Http::get($telegram_bot_api_webhook.$site_url_for_webhook);
    $data = $response->json();
    if ($data['description'])
    {
      $webhook_status = 'Webhook is set';
    } else
    {
      $webhook_status = 'Error with set webhook';
    }
    return redirect(route('admin_settings'));
  }

  public function removeWebhook()
  {
    $string_webhook_deleted = 'Webhook is already deleted';
    $webhook_status = '';
    $telegram_bot_api_remove_webhook = 'https://api.telegram.org/bot1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/deleteWebhook';
    $response = Http::get($telegram_bot_api_remove_webhook);
    $data = $response->json();
    if ($data['description'] ==$string_webhook_deleted)
    {
      $webhook_status = 'Webhook deleted';
    } else
    {
      $webhook_status = 'Error with remove webhook';
    }
    return redirect(route('admin_settings'));
  }

  public function get_file_max_width($array_id_width)
  {
    $array_width = array();
    foreach ($array_id_width as $file) {
      $array_width[] = (int)$file['width'];
    }
    $id_with_max_width = max($array_width);
    return strval($id_with_max_width);
  }

  public function get_file_id_by_width($array_file_ids, $width)
  {
    $file_id = '';
    foreach ($array_file_ids as $file) {
      if ($file['width'] == $width)
      {
        $file_id = $file['file_id'];
      }
    }
    return $file_id;
  }

  public function push_message_from_telegram(Request $request)
  {
    $array_with_posts = $this->multiple_posts_from_telegram($request->all());
    $telegram_bot_api = 'https://api.telegram.org/bot1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/';
    $telegram_bot_api_file = 'https://api.telegram.org/file/bot1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/';

      foreach ($array_with_posts as $post) {
        if ($post['title'] != '') {
          try {
          // print_r($post);
          $users_posts = new UsersPosts;
          $users_posts->user = 7;
          $users_posts->title = $post['title'];
          $users_posts->body = $post['message'];
          $users_posts->title_image = $post['photo'];
          $users_posts->published = 1;
          $users_posts->save();

          } catch (\Throwable $e) {
            print_r($e);
            print_r('ERROR IN SQL');
            $this->add_telegram_log('Error in SQL', $request, $e);
      }
    }
  }
    return 'Ok';
  }

  public function push_message_from_telegram_test(Request $request)
  {
    // $post = $request->json();
    $users_posts = new UsersPosts;
    $users_posts->user = 7;
    $users_posts->title = 'Title';
    $users_posts->body = $request;
    $users_posts->title_image = '12321.jpg';
    $users_posts->published = 0;
    $users_posts->save();
  }

  public function multiple_posts_from_telegram($request_with_updates)
  {

    $telegram_bot_api = 'https://api.telegram.org/bot1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/';
    $telegram_bot_api_file = 'https://api.telegram.org/file/bot1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/';
    $text_message = '';
    $title = '';
    $photos = '';
    $date_post = '';
    $file_name = '';
    $array_with_post = array();
    $array_with_posts = array();
    if (isset($request_with_updates['result']))
    {
      $array_with_updates = $request_with_updates['result'];
      foreach ($array_with_updates as $updates) {
        $array_with_posts = $this->parse_post_from_request($updates);
      }
    } else
    {
      $array_with_updates = $request_with_updates;
      print_r($array_with_updates);
      $array_with_posts = $this->parse_post_from_request($array_with_updates);
    }
    // $array_with_updates = $request_with_updates->result;

    print_r($array_with_posts);
    return $array_with_posts;
  }

  public function parse_post_from_request($updates)
  {
    $telegram_bot_api = 'https://api.telegram.org/bot1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/';
    $telegram_bot_api_file = 'https://api.telegram.org/file/bot1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/';
    $text_message = '';
    $title = '';
    $photos = '';
    $date_post = '';
    $file_name = '';
    $array_with_post = array();
    $array_with_posts = array();
      try {
        $array_with_post = $updates['channel_post'];
        try {
          $text_message = $array_with_post['caption'];
        } catch (\Throwable $e) {
          print_r('no index caption in array_post');
          $this->add_telegram_log('no index caption in array_post', $updates, $e);
          try {
            $text_message = $array_with_post['text'];
          } catch (\Throwable $e) {
            $this->add_telegram_log('no index text in array_post', $updates, $e);
            print_r('no index text in array_post');
          }
        }
      } catch (\Throwable $e) {
        print_r('no index channel_post in updates array');
        $this->add_telegram_log('no index channel_post in updates array', $updates, $e);
      }
      try {
        $date_post = $array_with_post['forward_date'];
      } catch (\Throwable $e) {
        print_r('no index forward_date in array_post');
        $this->add_telegram_log('no index forward_date in array_post', $updates, $e);
        try {
          $date_post = $array_with_post['date'];
        } catch (\Throwable $e) {
          print_r('no index date in array_post');
          $this->add_telegram_log('no index date in array_post', $updates, $e);
        }
      }

      try {
        $photos_array = $array_with_post['photo'];
        $max_width = $this->get_file_max_width($photos_array);
        $file_id = $this->get_file_id_by_width($photos_array, $max_width);
        $request_file_url = Http::get($telegram_bot_api.'getFile?file_id='.$file_id);
        $json_with_file_path = $request_file_url->json();
        $file_path = $json_with_file_path['result']['file_path'];
        $file_name = basename($file_path);
        file_put_contents('res/'.$file_name,file_get_contents($telegram_bot_api_file.$file_path));
        $array_with_posts[$date_post]['photo'] = $file_name;

      } catch (\Throwable $e) {
        print_r('no index photo in array_post');
        $this->add_telegram_log('no index photo in array_post', $updates, $e);
      }
      try {
        $array_with_posts[$date_post]['message'] = $text_message;
      } catch (\Throwable $e) {
        print_r('Error add message to $array_with_posts');
        $this->add_telegram_log('Error add message to $array_with_posts', $updates, $e);
      }
      try {
        $title = $this->parse_title_from_post($text_message);
        if (strlen($title) > 250)
        {
          $title = mb_substr($title, 0, 247). '...';
        }
        $array_with_posts[$date_post]['title'] = $title;
      } catch (\Throwable $e) {
        print_r($e);
        $this->add_telegram_log('Error add message to $array_with_posts', $updates, $e);
      }
    return $array_with_posts;
  }

  public function parse_title_from_post($post)
  {
    $title = '';
    preg_match("/([^.!?]+[^.!?])/", $post, $match_title);
    try {
      $title = $match_title[0];
    } catch (\Throwable $e) {
      // print_r($match_title);
    }
    return $title;
  }

  public function add_telegram_log($title, $request, $error)
  {
    $telegram_logs = new TelegramLogs;
    $telegram_logs->title = $title;
    $telegram_logs->request = json_encode($request);
    $telegram_logs->text_error = $error;
    $telegram_logs->save();
  }
}
