

<!DOCTYPE html>
<html>
<head>
    <title>Message System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Send a Message</h2>
        <form id="sendMessageForm">
            @csrf
            <div class="form-group">
                <label for="receiver_id">Receiver ID</label>
                <input type="text" class="form-control" id="receiver_id" name="receiver_id" required>
            </div>
            <div class="form-group">
                <label for="content">Message</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>

        <h2 class="mt-5">Received Messages</h2>
        <div id="messagesList">
            <!-- Messages will be loaded here -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Function to load messages
            function loadMessages() {
                $.get('/messages', function(data) {
                    let messages = data.data;
                    let messagesHtml = '';
                    messages.forEach(function(message) {
                        messagesHtml += '<div class="card mb-3">';
                        messagesHtml += '<div class="card-body">';
                        messagesHtml += '<h5 class="card-title">From User ID: ' + message.sender_id + '</h5>';
                        messagesHtml += '<p class="card-text">' + message.content + '</p>';
                        messagesHtml += '<p class="card-text"><small class="text-muted">Received at: ' + message.created_at + '</small></p>';
                        messagesHtml += '</div>';
                        messagesHtml += '</div>';
                    });
                    $('#messagesList').html(messagesHtml);
                });
            }

            // Load messages when the page loads
            loadMessages();

            // Handle form submission
            $('#sendMessageForm').submit(function(event) {
                event.preventDefault();
                let formData = $(this).serialize();

                $.post('/messages', formData, function(response) {
                    alert(response.message);
                    $('#sendMessageForm')[0].reset();
                    loadMessages();
                }).fail(function(response) {
                    alert('Error: ' + response.responseJSON.message);
                });
            });
        });
    </script>
</body>
</html>
