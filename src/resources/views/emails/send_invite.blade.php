@if($inviter->profile===null)</br>
<p>名前なし様</p></br>
@else
<p>{{$inviter->profile->name}}様</p>
@endif
</br>
<p>招待メールが届いております。</p>
<p>下記のURLよりご確認お願いいたします。</p>
</br>
<a href="{{$url['url']}}">{{$url['url']}}</a>