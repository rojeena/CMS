<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml"
      lang="en" xml:lang="en">
<head><title>Chatbot</title></head>
<link rel="stylesheet" href="<?php echo base_url('assets/chatbot-system/bootstrap/css/chat-interface.css')?>" />
<body>
    <div class="wrapper">
        <div class="container">

            <div class="right">
                <div class="top"><span><strong>Chatbot FAQ</strong></div>
                <div class="chat" id="chat-box">
                    <div class="bubble you">
                        Hello, this is VU's personal bot. How may I help you?
                    </div>
                </div>

                <div class="write">
                    <a href="javascript:;" class="write-link attach"></a>
                    <input type="text" class="chat-text" id="question" />
                    <button class="chat-send" id="send">Send</button>
                    <a href="javascript:;" class="write-link smiley"></a>
                    <a href="javascript:;" class="write-link send"></a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo base_url('assets/js/jquery-2.1.3.min.js');?>"></script>
<script>
    ( function(){

        let calculatedHeight = $(window).height() - $('#chat-box').position().top - $('.write').height() - 92;
        $('#chat-box').height(calculatedHeight);
        $('#chat-box').css('overflow-y', 'scroll');


        $('#question').keypress(function(e) {
            if (e.keyCode === 13)
                enter(e);
        });
        $('#send').click(function(){
            enter();
        });


        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        function enter(e) {
            $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
            let text = $('#question').val();
            $('#question').val('');
            $('#chat-box').append( $('<div class="bubble me">' + text + '</div>') );
            $('#chat-box').append( $('<div class="bubble you loading"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>') );
            $.ajax({
                url: '<?php echo base_url("home/getAnswer")?>',
                dataType: 'JSON',
                method: 'POST',
                data: {
                    'input': {
                        'text': text
                    }
                },
                success: function (response) {
                    let result = JSON.parse(response);
                    $('.loading').remove();
                    $('#chat-box').append( $('<div class="bubble you">' + result.output.text + '</div>') );
                    $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);

                    if(result.output.nodes_visited[0] === 'Anything else') {
                        saveToLocalDB(text);
                    }
                },
                error: function (error) {
                    console.log("Error", error);
                }
            });
        }

        function saveToLocalDB(question) {
            $.ajax({
                url: '<?php echo base_url("chatbot-system/faq/addUnanswered")?>',
                dataType: 'JSON',
                header: {
                    'Content-Type' : 'application/x-www-form-urlencoded'
                },
                method: 'POST',
                data: {question : question}
            })
        }

    })();
</script>
</html>
