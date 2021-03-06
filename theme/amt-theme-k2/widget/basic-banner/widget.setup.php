<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// input의 name을 wset[배열키], mo[배열키] 형태로 등록
// 기본은 wset[배열키], 모바일 설정은 mo[배열키] 형식을 가짐

?>

<ul class="list-group">
	<li class="list-group-item">
		<style>
			#widgetData.table { border-left:0; border-right:0; }
			#widgetData thead th { border-bottom:0; }
			#widgetData th,
			#widgetData td { vertical-align:middle; border-left:0; border-right:0; }
		</style>

		<p class="help-block">
			<i class="fa fa-caret-right" aria-hidden="true"></i>
			배너 이미지 주소 있는 것만 출력되며, 마우스 드래그로 위치이동이 가능함
		</p>

		<div class="table-responsive">
			<table id="widgetData" class="table table-bordered order-list no-margin">
			<thead>
			<tr class="active">
				<th class="text-center col-xs-4">배너이미지</th>
				<th class="text-center col-xs-3">링크</th>
				<th class="text-center">설명</th>
				<th class="text-center col-xs-2">타켓</th>
				<th class="text-center col-xs-1">삭제</th>
			</tr>
			</thead>
			<tbody id="sortable">
			<?php 

			// 직접등록 입력폼 
			$data = array();
			$data_cnt = (is_array($wset['d']['img'])) ? count($wset['d']['img']) : 1;

			// 이미지 검색주소
			$img_search_href = na_theme_href('image', 'title');

			for($i=0; $i < $data_cnt; $i++) {
				$n = $i + 1;
			?>
				<tr class="bg-light<?php echo ($i%2 != 0) ? '' : '-1';?>">
				<td>
					<div class="input-group">
						<input type="text" id="img_<?php echo $n ?>" name="wset[d][img][]" value="<?php echo $wset['d']['img'][$i] ?>" class="form-control" placeholder="http://...">
						<a href="<?php echo $img_search_href.'&amp;fid=img_'.$n; ?>" class="btn btn-default input-group-addon btn-setup">
							<i class="fa fa-search"></i>
						</a>
					</div>
				</td>
				<td>
					<input type="text" id="link_<?php echo $n ?>" name="wset[d][link][]" value="<?php echo $wset['d']['link'][$i] ?>" class="form-control" placeholder="http://...">
				</td>
				<td>
					<input type="text" id="alt_<?php echo $n ?>" name="wset[d][alt][]" value="<?php echo $wset['d']['alt'][$i] ?>" class="form-control">
				</td>
				<td>
					<select id="target_<?php echo $n ?>" name="wset[d][target][]" class="form-control">
						<option value="_self">현재창</option>
						<option value="_blank"<?php echo get_selected('_blank', $wset['d']['target'][$i])?>>새창</option>
					</select>
				</td>
				<td class="text-center">
					<?php if($i > 0) { ?>
						<a href="javascript:;" class="ibtnDel"><i class="fa fa-times-circle fa-2x lightgray"></i></a>
					<?php } ?>
				</td>
				</tr>
			<?php } ?>
			</tbody>
			</table>
		</div>

		<div class="h10"></div>

		<div class="text-center">
			<button type="button" class="btn bg-navy btn-bg" id="addrow">
				<span class="white">Add Banner</span>
			</button>
		</div>	
	</li>

	<li class="list-group-item">
		<div class="form-group">
			<label class="col-sm-2 control-label">슬라이더</label>
			<div class="col-sm-10">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
					<tbody>
					<tr class="active">
					<th class="text-center col-xs-3">캐시설정</th>
					<th class="text-center col-xs-3">수동실행</th>
					<th class="text-center col-xs-3">랜덤출력</th>
					<th class="text-center">비고</th>
					</tr>
					<tr>
					<td>
						<div class="input-group">
							<input type="text" name="wset[cache]" value="<?php echo $wset['cache'] ?>" class="form-control">
							<span class="input-group-addon">분</span>
						</div>
					</td>
					<td class="text-center">
						<input type="checkbox" name="wset[auto]" value="1"<?php echo get_checked('1', $wset['auto'])?> class="no-margin">
					</td>
					<td class="text-center">
						<input type="checkbox" name="wset[rand]" value="1"<?php echo get_checked('1', $wset['rand'])?> class="no-margin">
					</td>
					<td class="text-muted">
						캐시설정시 일정시간 랜덤출력 결과를 고정할 수 있음
					</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</li>

	<li class="list-group-item">
		<div class="form-group">
			<label class="col-sm-2 control-label">배너 이미지</label>
			<div class="col-sm-10">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
					<tbody>
					<tr class="active">
					<th class="text-center col-xs-3">이미지 너비</th>
					<th class="text-center col-xs-3">이미지 높이</th>
					<th class="text-center col-xs-3">좌우간격</th>
					<th class="text-center">비고</th>
					</tr>
					<tr>
					<td>
						<div class="input-group">
							<input type="text" name="wset[thumb_w]" value="<?php echo $wset['thumb_w'] ?>" class="form-control">
							<span class="input-group-addon">px</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input type="text" name="wset[thumb_h]" value="<?php echo $wset['thumb_h'] ?>" class="form-control">
							<span class="input-group-addon">px</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input type="text" name="wset[margin_w]" value="<?php echo $wset['margin_w'] ?>" class="form-control">
							<span class="input-group-addon">px</span>
						</div>
					</td>
					<td class="text-muted">
						&nbsp;
					</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</li>

	<li class="list-group-item" style="border-bottom:0;">
		<div class="form-group">
			<label class="col-sm-2 control-label">가로 갯수</label>
			<div class="col-sm-10">
				<div class="table-responsive">
					<table class="table table-bordered no-margin">
					<tbody>
					<tr class="active">
						<th class="text-center col-xs-3">기본</th>
						<th class="text-center col-xs-3">1200px 이하</th>
						<th class="text-center col-xs-2">992px 이하</th>
						<th class="text-center col-xs-2">768px 이하</th>
						<th class="text-center">480px 이하</th>
					</tr>
					<tr>
					<td>
						<div class="input-group">
							<input name="wset[item]" value="<?php echo ($wset['item']) ? $wset['item'] : '4'; ?>" class="form-control">
							<span class="input-group-addon">개</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input name="wset[lg]" value="<?php echo ($wset['lg']) ? $wset['lg'] : '4'; ?>" class="form-control">
							<span class="input-group-addon">개</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input name="wset[md]" value="<?php echo ($wset['md']) ? $wset['md'] : '3'; ?>" class="form-control">
							<span class="input-group-addon">개</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input name="wset[sm]" value="<?php echo ($wset['sm']) ? $wset['sm'] : '3'; ?>" class="form-control">
							<span class="input-group-addon">개</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input name="wset[xs]" value="<?php echo ($wset['xs']) ? $wset['xs'] : '2'; ?>" class="form-control">
							<span class="input-group-addon">개</span>
						</div>
					</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</li>

</ul>

<div class="h30"></div>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function () {
	var counter = <?php echo $data_cnt + 1 ?>;
	$("#addrow").on("click", function () {
		var trbg = (counter%2 === 1) ? 'bg-light-1' : 'bg-light';
		var newRow = $("<tr class=" + trbg + ">");
		var cols = "";

		cols += '<td>';
		cols += '	<div class="input-group">';
		cols += '		<input type="text" id="img_' + counter + '" name="wset[d][img][]" class="form-control" placeholder="http://...">';
		cols += '		<a href="<?php echo $img_search_href ?>&amp;fid=img_' + counter +'" class="btn btn-default input-group-addon btn-setup">';
		cols += '			<i class="fa fa-search"></i></a></div>';
		cols += '		</a>';
		cols += '	</div>';
		cols += '</td>';
		cols += '<td>';
		cols += '	<input type="text" id="link_' + counter + '" name="wset[d][link][]" class="form-control" placeholder="http://...">';
		cols += '</td>';
		cols += '<td>';
		cols += '	<input type="text" id="alt_' + counter + '" name="wset[d][alt][]" class="form-control">';
		cols += '</td>';
		cols += '<td>';
		cols += '	<select id="target_' + counter + '" name="wset[d][target][]" class="form-control">';
		cols += '	<option value="_self">현재창</option>';
		cols += '	<option value="_blank">새창</option>';
		cols += '	</select>';
		cols += '</td>';
		cols += '<td class="text-center">';
		cols += '	<a href="javascript:;" class="ibtnDel"><i class="fa fa-times-circle fa-2x lightgray"></i></a>';
		cols += '</td>';

		newRow.append(cols);
		$("table.order-list").append(newRow);
		counter++;
	});

	$("table.order-list").on("click", ".ibtnDel", function (event) {
		$(this).closest("tr").remove();
	});

	$("#sortable").sortable();
});
</script>
