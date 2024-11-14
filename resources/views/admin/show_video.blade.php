@if(!empty($video))
@php
$random = Str::random(5);
$ext =  !is_null(explode('.',$video)) && count(explode('.',$video)) > 0?explode('.',$video)[1]:'mp4';
@endphp

<div style="margin-top: 5px;display: inline-block;">
  <a href="{{ it()->url($video) }}" data-toggle="modal" data-target="#video_{{ $random }}">
    <i class="fa fa-photo-video fa-2x"></i>
  </a>
</div>
<div id="video_{{ $random }}" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="">
        <button type="button" class="btn btn-default btn-sm float-left" data-dismiss="modal">x</button>
      </div>
      <div class="modal-body">
        <video class="vjs-theme-fantasy video-js hidden" id="video{{ $random }}" data-setup='{"controls": true, "autoplay": false, "preload": "auto"}' width="762px" height="450px" >
          <source src="{{ it()->url($video) }}" type="video/{{ $ext }}"  >
        </video>
        <a href="{{ it()->url($video) }}" target="_blank" class="float-left"><i class="fa fa-download"></i></a>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
var mplayer;
$("#video_{{ $random }}").on('shown.bs.modal', function (e) {
mplayer =  videojs('#video{{ $random }}', {
controls: true,
autoplay: false,
preload: 'auto'
});
$('#video{{ $random }}').removeClass('hidden');
});
$("#video_{{ $random }}").on('hidden.bs.modal', function() {
mplayer.pause();
});
});
</script>
@endif