<?php
	/*
	Author: Ahmet Burak Babürşah https://burakbabursah.com
	*/

	function mailMaskele ( $email ) {
	    $mailBölümleri = explode("@", $email); // explode fonksiyonu ile mailimizi (@) işaretinden öncesi ve sonrası olmak üzere 2 bölüme ayırıyoruz.
	    $kullanıcıAdı = $mailBölümleri[0]; // ilk bölümü $kullanıcıAdı değişkenine atıyoruz.
		$mailBölümleri[0] = substr( $kullanıcıAdı, 0, 2 ) // $kullanıcıAdı ifadesinin (0)'ncı karakterinden başlayarak (2) karakter döndürür. örn: example@burakbabursah.com için ex@burakbabursah.com ifadesi döner. Ama bu işlevi $kullanıcıAdı ifadesine yaptığımız için "example" ifadesi "ex" olarak dönecektir.
		. str_repeat("*", 5 ); // "ex" olarak dönen ifademize (5) adet (*) işareti ekler. örn: ex*****@burakbabursah.com. Aslında mail adresinin karakter sayısına göre (*) işareti ekleme yapabiliriz ama sabit bir ifade eklemek tahmin edilmesini zorlaştıracağından daha güvenli olur. Yani şu an maillerimiz sabit 7 karakter olarak maskelendi.
			
		return implode("@", $mailBölümleri ); // @ ile 2 bölüme ayırdığımız mail adresini implode fonksiyonu ile arasına (@) işareti koyarak birleştiriyoruz. kullanıcı adı: ex***** | domain: burakbabursah.com   çıktı: ex*****@burakbabursah.com
	}
	
	$maskelenecekMail = array($user->email); // mail adreslerimizi burada tanımlıyoruz. Birden fazla mail adresini (,) ile ayırarak girebilirsiniz.
	
	foreach( $maskelenecekMail as $email ){ 
	    $maskelenenMail = mailMaskele ( $email ); 
	    // foreach döngüsü tanımladığımız tüm mail adresleri için fonksiyonumuzu çalıştırdı ve $maskelenenMail değişkenine atadı.
	}
	
	echo $maskelenenMail; // Maskelenen mailimizi ekrana yazdırıyoruz.
?>
