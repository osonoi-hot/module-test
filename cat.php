<?php
function console_log($data){
    echo '<script>';
    echo 'console.log('.json_encode($data).')';
    echo '</script>';
  }
// APIのエンドポイント
$apiUrl = 'https://api.thecatapi.com/v1/images/search';

// cURLを初期化
$ch = curl_init();

// cURLオプションを設定
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// リクエストを実行し、レスポンスを取得
$response = curl_exec($ch);

// cURLセッションを閉じる
curl_close($ch);

// レスポンスをJSONデコード
$data = json_decode($response, true);
console_log($data[0]['url']);

// 猫の画像URLを取得
if (!empty($data) && is_array($data)) {
    $catImageUrl = $data[0]['url'];

    // 画像を表示
    echo '<img src="' . $catImageUrl . '" alt="Cat">';
} else {
    // エラーが発生した場合の処理
    echo '猫の画像を取得できませんでした。';
}
?>