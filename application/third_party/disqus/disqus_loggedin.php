<?php
define('DISQUS_SECRET_KEY', 'dEV5Kzcus4BnCC3KM2KcxvjASHJcA4Jfw64gJtA3iPwjCexEpyLyJ6xW5Kt4rk0c');
define('DISQUS_PUBLIC_KEY', 'eED3pOvPDPHpAMK9wSBdDeq60Ys33CsqPUEZbTVXwQjYMTrwMStsXXoCwGXQVK7H');

$data = array(
    "id" => get_userdata('active_user'),
    "username" => get_userdata('name'),
    "email" => get_userdata('email')
);

function dsq_hmacsha1($data, $key)
{
    $blocksize = 64;
    $hashfunc = 'sha1';
    if (strlen($key) > $blocksize)
        $key = pack('H*', $hashfunc($key));
    $key = str_pad($key, $blocksize, chr(0x00));
    $ipad = str_repeat(chr(0x36), $blocksize);
    $opad = str_repeat(chr(0x5c), $blocksize);
    $hmac = pack(
        'H*', $hashfunc(
            ($key ^ $opad) . pack(
                'H*', $hashfunc(
                    ($key ^ $ipad) . $data
                )
            )
        )
    );
    return bin2hex($hmac);
}

$message = base64_encode(json_encode($data));
$timestamp = time();
$hmac = dsq_hmacsha1($message . ' ' . $timestamp, DISQUS_SECRET_KEY);
?>

<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
     */

    var disqus_config = function () {
        this.page.url = '<?php echo current_url() ?>';
        this.page.identifier = '<?php echo end(explode('/', current_url())) ?>';
        this.page.remote_auth_s3 = '<?php echo "$message $hmac $timestamp"; ?>';
        this.page.api_key = "<?php echo DISQUS_PUBLIC_KEY; ?>";
    };

    (function () {  // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');

        s.src = '//kathmandubusinessincubationcentre.disqus.com/embed.js';

        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>
    Please enable JavaScript to view the
    <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a>
</noscript>