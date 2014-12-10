$(document).ready(function() {
    $("#createQuiz").validate({
    	messages: {
            title: {
              required: "クイズタイトルは必須項目です。",
            }
          }
    });
});