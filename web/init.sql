insert into questions values(1, 'cookieはどんな課題を解決する？', 'cookieはhttpのどんな課題を解決するものでしょうか？', '速度が遅い', '状態を管理できない', '複雑である', 'セキュリティが弱い', 2, '2014/11/11 11:11:11', '2014/11/11 11:11:22');
insert into questions values(2, 'HTTP1.1でサポートした機能１', 'HTTP1.1でサポートしたのうち、TCPのコネクション１つで複数のHTTP通信をするのは？', 'マルチ接続', '多重接続', '接続的接続', '複数接続', 3, '2014/11/11 11:11:12', '2014/11/11 11:11:22');
insert into questions values(3, 'HTTP1.1でサポートした機能２', 'HTTP1.1でサポートした機能でレスポンスを待たずに次のリクエストを発行するのは？', 'パイプライン化', 'マルチライン化', '多重化', '分散化', 1, '2014/11/11 11:11:13', '2014/11/11 11:11:22');
insert into questions values(4, 'プロキシヘッダ', 'プロキシを経由した場合に追加されるヘッダ情報は？', 'Connection', 'Cache', 'User-Agent', 'via', 4, '2014/11/11 11:11:14', '2014/11/11 11:11:22');
insert into questions values(5, '同時指定の優先度', 'HTTP1.1において、max-ageとExpiresを同時に指定した場合、どちらが採用されるでしょうか？', 'max-age', 'Expires', '値が古い方', '値が新しい方', 1, '2014/11/11 11:11:15', '2014/11/11 11:11:22');
insert into questions values(6, 'HTTP1.1ヘッダの必須項目', 'HTTP1.1のヘッダで必須項目なのは？', 'Expires', 'Host', 'Server', 'Date', 2, '2014/11/11 11:11:16', '2014/11/11 11:11:22');
insert into questions values(7, '条件つきリクエスト', '条件付きリクエストでサーバ上のリソースを特定するためにつけられた値を何という？', 'CTag', 'ETag', 'KTag', 'MTag', 2, '2014/11/11 11:11:17', '2014/11/11 11:11:22');
insert into questions values(8, 'httpヘッダインジェクション', 'httpヘッダインジェクション攻撃を引き起こす特殊な文字は？', '%0D0A', '%0D', '%0A', '%0D%0A', 4, '2014/11/11 11:11:18', '2014/11/11 11:11:22');
insert into questions values(9, 'httpsポート', 'httpsのデフォルトポート番号は？', '25', '80', '443', '445', 3, '2014/11/11 11:11:19', '2014/11/11 11:11:22');
insert into questions values(10, 'SPDY', 'googleが開発した高速化を目的とした通信プロトコルは？', 'WebSocket', 'SPDY', 'WebRTC', 'RTSP', 2, '2014/11/11 11:11:10', '2014/11/11 11:11:22');
insert into quizzes values(1, 'httpクイズ', '2014/11/11 11:11:31', '2014/11/11 11:11:22');
insert into quizzes values(2, '通信クイズ', '2014/11/11 11:11:32', '2014/11/11 11:11:22');
insert into quizzes values(3, 'webクイズ', '2014/11/11 11:11:33', '2014/11/11 11:11:22');
insert into question_quiz values(1, '1', '1', '2014/11/11 11:11:41', '2014/11/11 11:11:22');
insert into question_quiz values(2, '2', '1', '2014/11/11 11:11:42', '2014/11/11 11:11:22');
insert into question_quiz values(3, '3', '1', '2014/11/11 11:11:43', '2014/11/11 11:11:22');
insert into question_quiz values(4, '4', '1', '2014/11/11 11:11:44', '2014/11/11 11:11:22');
insert into question_quiz values(5, '5', '1', '2014/11/11 11:11:45', '2014/11/11 11:11:22');
insert into question_quiz values(6, '6', '1', '2014/11/11 11:12:31', '2014/11/11 11:11:22');
insert into question_quiz values(7, '7', '1', '2014/11/11 11:13:31', '2014/11/11 11:11:22');
insert into question_quiz values(8, '8', '1', '2014/11/11 11:14:31', '2014/11/11 11:11:22');
insert into question_quiz values(9, '9', '1', '2014/11/11 11:15:31', '2014/11/11 11:11:22');
insert into question_quiz values(10, '10', '1', '2014/11/11 12:11:31', '2014/11/11 11:11:22');
insert into question_quiz values(11, '1', '2', '2014/11/11 13:11:31', '2014/11/11 11:11:22');
insert into question_quiz values(12, '5', '2', '2014/11/11 14:11:31', '2014/11/11 11:11:22');
insert into question_quiz values(13, '9', '2', '2014/11/11 15:11:31', '2014/11/11 11:11:22');
insert into question_quiz values(14, '1', '3', '2014/11/11 16:11:31', '2014/11/11 11:11:22');
insert into question_quiz values(15, '3', '3', '2014/11/11 17:11:31', '2014/11/11 11:11:22');
insert into question_quiz values(16, '7', '3', '2014/11/11 18:11:31', '2014/11/11 11:11:22');
insert into question_quiz values(17, '10', '3', '2014/11/11 19:11:31', '2014/11/11 11:11:22');