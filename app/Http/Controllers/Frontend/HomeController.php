<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Page;
use App\Models\Comment;
use Illuminate\Http\Request;
use Mail;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    
    public function phoneValidation($phone){
    	
    	$pattern = "#(\+?( |-|\.)?\d{1,2}( |-|\.)?)?(\(?\d{3}\)?|\d{3})(|-|\.)?(\d{3}( |-|\.)?\d{5})#i";
    	$match = preg_match($pattern, $phone, $matches);
    	if ($match == 1) {
    		$phone ='';
	    	for ($i=1; $i <= 6; $i++) { 
	            $phone .= trim($matches[$i]);
	            $phone = preg_replace("/[\.\-\+\s+\(\)]/", '', $phone);
	        }
	    	return $phone;
	    } else {
	    	return false;
	    }
    }
    public function index()
    {
        $slider = Page::where('slug','home_slider')->first();
        if ($slider) {
            $slider_text = html_entity_decode($slider->body);
        }
        $about = Page::where('slug','home_about')->first();
        if ($about) {
            $about_text = html_entity_decode($about->body);
        }
        $train = Page::where('slug','home_training')->first();
        if ($train) {
            $train_text = html_entity_decode($train->body);
        }
        $posts = Posts::where('type','train')->orderBy('created_at','asc')->limit(3)->get();
        return view('frontend.index',compact('slider_text','train_text','about_text','posts'));
    }
    public function about()
    {
        $train = Page::where('slug','home_training')->first();
        if ($train) {
            $train_text = html_entity_decode($train->body);
        }
        $about = Page::where('slug','about')->first();
        if ($about) {
            $about_text = html_entity_decode($about->body);
        }
        $posts = Posts::where('type','train')->orderBy('created_at','asc')->limit(3)->get();
        return view('frontend.about',compact('posts','about_text','train_text'));
    }
    public function contacts()
    {
        return view('frontend.contacts');
    }
    public function blog()
    {
    	$posts = Posts::paginate(3);
        return view('frontend.blog',compact('posts'));
    }
    public function post($post)
    {
        $post = Posts::find($post);
        return view('frontend.post',compact('post'));
    }
    public function commentCreate(Request $request)
    {
        $comment = new Comment();
        $comment->author_name = $request->author_name;
        $comment->post_id = $request->post_id;
        $comment->body = $request->body;
        $comment->save();
        return redirect()->back()->withFlashSuccess('Комментарий отправлен');
    }
    public function callbackForm(Request $request)
    {
        if( !$this->phoneValidation($request->phone ) ) {
            $result = array(
               'success' =>false,
               'message'=>'Введите номер в международном формате'
            );
            return response()->json($result);
        }
        
        if ($request->name && $request->phone) {

            $to      = 'bogdannesterenko.coach@gmail.com';
            $subject = 'Заказали обратный звонок';
            $message = 'Имя '.$request->name.'.Телефон:'.$request->phone;
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                "MIME-Version: 1.0\r\n".
                "Content-type: text/html; charset=utf8\r\n";

            if (mail($to, $subject, $message, $headers)) {
                $result = array(
                   'success' =>true,
                    'message' =>'Мы вам перезвоним'
                );
            } else {
                $result = array(
                   'success' =>false,
                   'message' =>'Ошибка отправления'
                );
            }

        } else {
            $result = array(
               'success' =>false,
                'message' =>'Заполните все поля'
            );
        }
        
        return response()->json($result);
    }
    public function contactForm(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
        } else {
            $result = array(
               'success' =>false,
               'message' =>'Введите корректный email'
            );
            return response()->json($result);

        }
        if ($request->email && $request->name && $request->body) {

            $to      = 'bogdannesterenko.coach@gmail.com';
            $subject = 'Свяжитесь с нами';
            $message = 'Имя '.$request->name.'.Email:'.$request->emai.'.Сообщение:'.$request->body;
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                "MIME-Version: 1.0\r\n".
                "Content-type: text/html; charset=utf8\r\n";

            if (mail($to, $subject, $message, $headers)) {
                $result = array(
                   'success' =>true,
                    'message' =>'Сообщение отправлено'
                );
            } else {
                $result = array(
                   'success' =>false,
                    'message' =>'Ошибка отправления'
                );
            }

        } else {
            $result = array(
               'success' =>false,
                'message' =>'Заполните все поля'
            );
        }
        
        return response()->json($result);
    }
    public function assign(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
        } else {
            $result = array(
               'success' =>false,
               'message' =>'Введите корректный email'
            );
            return response()->json($result);

        }
        if ($request->email) {
            $to      = $request->email;
            $subject = 'Подписка';
            $message = 'Вы подписались на нашу рассылку';
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                "MIME-Version: 1.0\r\n".
                "Content-type: text/html; charset=utf8\r\n";

            if (mail($to, $subject, $message, $headers)) {
                $result = array(
                   'success' =>true,
                    'message' =>'Благодарим за подписку'
                );
            } else {
                $result = array(
                   'success' =>false,
                    'message' =>'Ошибка отправления'
                );
            }
        } else {
            $result = array(
               'success' =>false,
                    'message' =>'Заполните все поля'
            );
        }
        
        return response()->json($result);
    }
    
}