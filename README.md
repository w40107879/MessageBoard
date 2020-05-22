# PHP-laravel
Message-Board with laravel

有登入登出功能
文章新增 刪除 修改
可上傳照片
文章會顯示留言數目

新增第三方API FB登入
採用Laravel Socialite套件可直接與FB進行串接(也可與github google串接)
由於FB login需要https的webhook
自行架設的lamp架構無法提供
於是把loaclhost掛在ngrok上
有些必要網址必須改成ngrok(fb call back)
