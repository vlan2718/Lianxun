<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>新闻详情</title>
	<link rel="stylesheet" href="{{asset('api/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('admin/js/layer/mobile/need/layer.css')}}">
	<script src="{{asset('admin/js/jquery-1.8.2.min.js')}}"></script>
	<script src="{{asset('admin/js/layer/layer.js')}}"></script>

</head>
<body>
	<header>
		<i class="goback-btn" onclick="alert('goback')"></i>
		<a href="javascript:;" class="share" onclick="alert('share');">分享<i class="share-icon"></i></a>
	</header>
	<h1 class="newtitle">{{$data->title}}</h1>
	<div class="info">
		<p class="date">{{date("Y-m-d H:i",$data->created_at)}}</p>
		
		<p class="edit"><i class="edit-icon" onclick="alert('edit')"></i>
			@if($point['point'] == null)
				0分
				@else
				{{$point['point']}}分
			@endif
		</p>
		<p class="zan"><i class="zan-icon" onclick="alert('赞')"></i>738</p>
	</div>
	<ul class="tags">
		@foreach($tag as $v)
			<li><a href="#">{{$v->name}}</a></li>
		@endforeach
	</ul>
	<article>
		<div class="description">
			<p>{{$data->description}}</p>
		</div>
		<div class="body">
			{{$data->content}}
		</div>
	</article>
	<footer>
		<ul>
			<li class="collection"><i class="collection-icon"></i>收藏</li>
			<li class="pdf" ><i class="pdf-icon"></i><a href="{{url('api/v1/news/MakePdf')}}" target="_blank">导出到pdf</a> </li>
			<li class="email" onclick="alert('暂未接通');"><i class="email-icon"></i>发送到邮箱</li>
		</ul>
		<input type="hidden" id="uid" value="{{$user_id}}" />
		<input type="hidden" id="news_id" value="{{$news_id}}" />
		<a href="javascript:void(0)" class="jubao">举报</a>
	</footer>
	<div class="report">
		<div class="Report-list">
			<ul>
				@foreach($report as $value)
					<li><i class="content" data="{{$value->value}}"></i>{{$value->value}}</li>
				@endforeach
			</ul>
		</div>
		<div class="report-test">
			<p class="test">输入详情</p>
			<textarea class="inroduction" name="inroduction" cols ="80" rows="5"></textarea>
			<p class="report-button"><input  type="button" class="confirm" name="" value="提交举报"/></p>
		</div>
	</div>
	<script>
		$(".collection").click(function () {
		    var uid=$("#uid").val();
		    var news_id=$("#news_id").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : "POST", //提交方式
                url : "{{url('/api/v1/news/NewsCollection')}}",//路径
                data : {
                    "user_id":uid,
                    "news_id":news_id,
                },//数据，这里使用的是Json格式进行传输
                success : function(result) {
                    if(result.code=='1'){
                        alert('收藏成功');
					}else{
                        alert('收藏失败，该文章已收藏');
					}
                }
            });
        });
		$(".jubao").click(function () {
            layer.open({
                type: 1,
                skin: 'layui-layer-demo', //样式类名
                closeBtn: 0, //不显示关闭按钮
                anim: 2,
                shadeClose: true, //开启遮罩关闭
                content:$(".report")
            });
        });
        $(".content").click(function () {
            $(".content").removeClass('but');
            $(this).addClass('but');
        });

		$(".confirm").click(function () {
            var uid=$("#uid").val();
			var report=$(".but").attr('data');
			var inroduction=$(".inroduction").val();
			if(report!==undefined){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type : "POST", //提交方式
                    url : "{{url('/api/v1/news/ReportReason')}}",//路径
                    data : {
                        "user_id":uid,
                        "reason":report,
                        "remark":inroduction
                    },//数据，这里使用的是Json格式进行传输
                    success : function(result) {
                        if(result.code=='1'){
                            alert('举报成功');
                            layer.closeAll()
                        }
                    }
                });
			}else{
			    alert('请填写举报原因');
			}
        })
	</script>
</body>
</html>