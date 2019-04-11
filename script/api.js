function send() {
    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        console.log(this.responseText);
    };

    xmlhttp.open("POST","https://api.chatfuel.com/bots/5a5ae47ce4b0d02fda1761a1/users/853583198099909/send?chatfuel_token=qwYLsCSz8hk4ytd6CPKP4C0oalstMnGdpDjF8YFHPHCieKNc0AfrnjVs91fGuH74&chatfuel_message_tag=UPDATE&chatfuel_block_id=5caf143b76ccbc0b2e7f0bf0",true);
    xmlhttp.send();
}