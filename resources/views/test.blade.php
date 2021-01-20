   <!-- Post Comment -->
   <ul id="data">
     <div class="post-a-comment-area ">
       <div class="contact-form-area" id="review-comment">
         <div class="comment-content d-flex">

           <form action="{{route('post-comment')}}" method="post" id="form-comment">
             @csrf
             <div class="row">
               <input type="text" name="post_id" id="post_id" value="{{$post->id}}" hidden />
               <div class="col-10">
                 <textarea type="text" name="comment" class="form-control text-white" id="comment" placeholder="Viết bình luận ..." required style="width: 100%; height: 70%;"></textarea>
               </div>
               <div class="col-2" style="float: right;">
                 <button id="btn_comment" class="btn vizew-btn " type="submit" style="margin-right: -13%;">Bình luận</button>
               </div>
             </div>
           </form>
         </div>
         <hr style="background-color: whitesmoke; opacity: 50%;">
       </div>
     </div>
     <div id="comments" class="comment_listing">

       <!-- show comments -->
       @foreach($comments as $comment)
       <li class="single_comment_area" id="{{$comment->id}}">
         <div class="comment-content d-flex">
           <div class="comment-author">
             <img src="<?php echo url('/'); ?>/upload/images/{{$comment->avatar}}" alt="author" style="margin-top: 20%;">
           </div>
           <div class="comment-meta alert ">
             <div class=" alert " style="background-color: #393c3d;  width: 550px;">
               <h6 style="color: white;">{{$comment->name}}</h6>
               <span>{{$comment->content}}</span>
             </div>
             @if(Auth::check())
             @if(Auth::user()->id == $comment->user_id)
             <div class="dropdown dropright" style="margin-top: -11%; margin-right: -5%; float: right; ">
               <i class="fas fa-ellipsis-h  " data-toggle="dropdown"></i>
               <div class="dropdown-menu " style="background: none;border: none;">
                 <a href="#" class="reply dropdown-item">Chỉnh sửa</a>
                 <a href="{{route('comment.delete', ['id'=>$comment->id])}}" class="reply dropdown-item">Xóa</a>
               </div>
             </div>
             @endif
             @endif
             <div class="d-flex align-items-center row" style="float: right;width: 100%;">
               <a onclick="reply({{$comment->id}}, {{$replies}})" class="reply" style="height: 30px;">Reply</a>
               <p class="comment-date" style="font-size: 13px; margin-top: 2%;">{{$comment->created_at}}</p>
             </div>
           </div>
         </div>

         <!-- reply -->
         <div class=" " style="margin-top: -5%;">
           <form action="{{route('post-reply')}}" method="post" id="form-comment" style="margin-left: 18%; width: 68%;">
             @csrf
             <input type="text" name="comment_id" id="comment_id" value=" {{$comment->id}} " hidden />
             <input type="text" name="post_id" id="post_id" value="{{$post->id}}" hidden />
             <div class="row" id="reply-{{$comment->id}}">

             </div>
           </form>
         </div>
         <!-- more reply -->
         <ol class="children" style="margin-top: -5%; ">
           <li class="single_comment_area">
             @foreach($replies as $reply)
             @if($reply->comment_id == $comment->id)
             <div class="comment-content d-flex" style="height: 130px;">
               <div class="comment-author">
                 <img src="<?php echo url('/'); ?>/upload/images/{{$reply->avatar}}" alt="author" style="margin-top: 20%;">
               </div>
               <div class="comment-meta alert">
                 <div class=" alert " style="background-color: #393c3d;  width: 499PX;">
                   <h6 style="color: white;">{{$reply->name}}</h6>
                   <span>{{$reply->content}}</span>
                 </div>
                 @if(Auth::check())
                 @if(Auth::user()->id == $reply->user_id)
                 <div class="dropdown dropright" style="margin-top: -11%; margin-right: -5%; float: right; ">
                   <i class="fas fa-ellipsis-h  " data-toggle="dropdown"></i>
                   <div class="dropdown-menu " style="background: none;border: none;">
                     <a href="#" class="reply dropdown-item">Chỉnh sửa</a>
                     <a href="{{route('replies.delete', ['id'=>$reply->id])}}" class="reply dropdown-item">Xóa</a>
                   </div>
                 </div>
                 @endif
                 @endif
                 <div class="d-flex align-items-center" style="float: right;width: 100%;">
                   <p class="comment-date " style="margin-right: 37%;">{{$reply->created_at}}</p>
                 </div>
               </div>
             </div>
             @endif
             @endforeach
           </li>
         </ol>
         <!-- end more reply -->

       </li>
       @endforeach
     </div>
   </ul>

   <!-- end comments -->