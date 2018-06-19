<html prefix="og: http://ogp.me/ns#">
<head>
	
	<title>{{ $item->name }}</title>

        <meta property="fb:app_id" content="1636719853223327" />
        <meta property="al:android:url" content="wonderlist.grabproperty://grab={{ $item->id }}&name={{ $item->name }}" />
        <meta property="al:android:package" content="com.wonderlist.property" />
        <meta property="al:android:app_name" content="Wonderlist" />

  
        <meta property="og:title" content="{{ $item->name }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ route('grab.app', array( 'id' => $item->id )) }}" />
        <meta property="og:image" content="{{ GRAB_IMAGE_URL . '/' . $item->id . '/' . $item->image }}" />

        <meta property="al:ios:url" content="wonderlist://grab?id={{ $item->id }}&name={{ $item->name }}" />
        <meta property="al:ios:app_name" content="Wonderlist" />
        <meta property="al:ios:app_store_id" content="985884500" />
        
        <meta property="al:web:should_fallback" content="false" />
        <meta property="al:web:url" content="http://wonderlist.property/" />
        <meta http-equiv="refresh" content="0;url=http://wonderlist.property/" />

</head>
</html>


<script>

function open() {
   
    // If it's not an universal app, use IS_IPAD or IS_IPHONE
    if (getMobileOperatingSystem()=='iOS') {
        //window.location = "wonderlist://grab?id="+ <?php echo $item->id?> +"&name="+ <?php echo $item->name?>+'"';
    window.location = "wonderlist://grab?id="+ <?php echo $item->id?> + "&name=" + <?php echo json_encode($name) ?> + "";
        setTimeout(function() {
    
            // If the user is still here, open the App Store
            if (!document.webkitHidden) {
    
                // Replace the Apple ID following '/id'
                window.location = 'http://itunes.apple.com/app/id1234567';
            }
        }, 25);
    
    }else if(getMobileOperatingSystem()=='Android'){
        
        window.location = "wonderlist://wonderlist/grab/app/"+ <?php echo $item->id?>;
        setTimeout(function() {
    
            // If the user is still here, open the App Store
            if (!document.webkitHidden) {
    
                // Replace the Apple ID following '/id'
                window.location = 'https://play.google.com/store/apps/details?id=com.wonderlist.property&hl=en';
            }
        }, 25);
    }
}


function getMobileOperatingSystem() {
  var userAgent = navigator.userAgent || navigator.vendor || window.opera;

  if( userAgent.match( /iPad/i ) || userAgent.match( /iPhone/i ) || userAgent.match( /iPod/i ) )
  {
    return 'iOS';

  }
  else if( userAgent.match( /Android/i ) )
  {

    return 'Android';
  }
  else
  {
    return 'unknown';
  }
}

window.onload = open;
</script>