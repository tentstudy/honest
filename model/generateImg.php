<?php 
	require_once __DIR__.'/imglib.php';
	require_once __DIR__.'/connect.php';
	// kiểm tra và lấy dữ liệu từ id message;
	$id= $_POST['id'];
	$query = "select content from messages where id='{$id}'";
	if(!$db->query($query))
	{
		echo json_encode([
    		'success' => false,
    		'message' => "not found"
    	]);
    	return;
	}

	//quá trình 
	$result = $db->query($query);
	$cap;
	if($result->num_rows>0)
	{
		$message = $result->fetch_assoc();
		$cap=$message['content'];
	}
	

    $capImg = ImageCreateFromJpeg(__DIR__ . '/../images/capbackground.jpg');

    $capColor= ImageColorAllocate($capImg, 0, 0, 0);

    $capFont = __DIR__ . '/../font/arial.ttf';

    $capFontSize = "24";

    $soChuMotDong = 15;

    $kichThuocMotChu=15;


    $arrRuleText = splitStringToMultiLine($cap, $soChuMotDong);

    $y = 210;

    foreach ($arrRuleText as $line) {
        ImagettfText(
            $capImg, $capFontSize, 0,
            getStartPoint($line, $kichThuocMotChu, 500),
            $y, $capColor, $capFont, $line);
        $y += 45;
    }

    
    imagepng($capImg,"../images/capImages/{$id}.png");
    
    ImageDestroy($capImg);

    echo json_encode([
    		'success' => true,
    		// 'url' => "http://honest.devv/images/capImages/{$id}.png"
            'url' => "https://i.pinimg.com/736x/16/24/59/162459d2954b49d5fdfad06c83809e7d--sang-tr%E1%BB%8Dng-bangs.jpg"
    	]);


    // echo "<img src=\"data:image/png;base64,{$src}\">";
 ?>