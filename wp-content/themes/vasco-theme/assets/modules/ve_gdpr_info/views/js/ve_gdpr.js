
jQuery(function ($) {
	function ipLookUp() {
		$.ajax('https://ipapi.co/json').then(
			function success(response) {
				var continent = response.continent_code;
				var country = response.country;
				if (continent == 'EU') {
					if (country == 'PL') {
						var title = 'Twoja prywatność jest dla nas ważna!';
						var content = 'Nasza strona chroni Twoje dane osobowe zgodnie z Rozporządzeniem o Ochronie Danych Osobowych (tzw. RODO). Twoje dane osobowe potrzebne nam są tylko do przetworzenia zamówienia. Informujemy, że dane są przechowywane na naszych serwerach w Stanach Zjednoczonych. W celu przechowywania Twoich danych poza Europejskim Obszarem Gospodarczym potrzebujemy Twojej zgody. Zgoda jest dobrowolna, ale bez niej nie będziemy w stanie zrealizować zamówienia.';
						var button = 'Zgadzam się';
					} else if (country == 'FR') {
						var title = 'Votre vie privée est importante !';
						var content = 'Notre site Web protège vos données personnelles et adhère au Règlement général de l\'Union européenne sur la protection des données (RGPD). Vos données personnelles ne seront utilisées que pour traiter la commande. Nous vous informons que nous stockons vos données sur nos serveurs situés aux États-Unis. Afin de stocker vos données personnelles en dehors de l\'Espace économique européen, nous avons besoin de votre consentement. Le consentement est volontaire, mais sans cela, nous ne pourrons pas traiter la commande.';
						var button = 'J\'accepte';
					} else if (country == 'DE') {
						var title = 'Der Schutz Ihrer Daten ist uns wichtig	';
						var content = 'Unsere Website schützt Ihre personenbezogenen Daten und hält sich an die Vorgaben der Europäischen Datenschutzgrundverordnung (DSGVO). Ihre personenbezogenen Daten werden ausschließlich zur Bestellungsbearbeitung verwendet. Wir speichern Ihre Daten dazu auf Servern, die sich in den USA befinden. Für die Speicherung Ihrer personenbezogenen Daten außerhalb des Europäischen Wirtschaftsraums benötigen wir Ihre Zustimmung. Diese Einwilligung ist freiwillig, allerdings können wir ohne Einwilligung die Bestellung nicht bearbeiten.';
						var button = 'Ich stimme zu';
					} else if (country == 'IT') {
						var title = 'La tua privacy è importante';
						var content = 'Il nostro sito web protegge i dati personali e aderisce al regolamento generale sulla protezione dei dati dell\'Unione Europea (GDPR). I dati personali saranno utilizzati solo per l’elaborazione dell\'ordine. Ti informiamo i tuoi dati verranno salvati sui nostri server ubicati negli Stati Uniti d\'America. Per poter conservare i tuoi dati personali al di fuori dell\'area economica europea, abbiamo bisogno del tuo consenso. Il consenso è volontario, ma senza di esso non saremo in grado di elaborare l\'ordine.';
						var button = 'Accetto';
					} else if (country == 'ES') {
						var title = 'Su privacidad es importante';
						var content = 'Nuestro sitio web protege sus datos personales y se adhiere al Reglamento General de Protección de Datos (GDPR) de la Unión Europea. Sus datos personales serán utilizados únicamente para procesar el pedido. Le informamos que almacenaremos sus datos en nuestros servidores ubicados en los Estados Unidos de América. Para almacenar sus datos personales fuera del Espacio Económico Europeo, necesitamos su consentimiento. El consentimiento es voluntario, pero sin él, no podremos procesar el pedido.';
						var button = 'Acepto';
					} else if (country == 'SK') {
						var title = 'Vaše súkromie je dôležité';
						var content = 'Naše webové stránky chránia vaše osobné údaje a dodržiavajú nariadenie o všeobecnej ochrane údajov Európskej únie (GDPR). Vaše osobné údaje budú použité iba na spracovanie objednávky. Radi by sme Vás informovali, že vaše údaje budú uložené na našich serveroch nachádzajúcich sa v Spojených štátoch amerických. Na ukladanie vašich osobných údajov mimo Európskeho hospodárskeho priestoru potrebujeme váš súhlas. Súhlas je dobrovoľný, ale bez neho nebudeme schopní spracovať objednávku.';
						var button = 'Súhlasím';
					} else if (country == 'CZ') {
						var title = 'Vaše soukromí je chráněno';
						var content = 'Naše internetové stránky ochraňují Vaše osobní údaje v souladu s Nařízením o ochraně osobních údajů (tzv. GDPR). Vaše osobní údaje potřebujeme pouze pro zpracování objednávky. Informujeme Vás, že Vaše údaje jsou uchovávány na našich serverech ve Spojených Státech. Za účelem uchovávání Vašich osobních údajů mimo Evropský hospodářský prostor potřebujeme Váš souhlas. Souhlas je dobrovolný, ale bez souhlasu nebudeme schopni zpracovat Vaši objednávku.';
						var button = 'Souhlasím';
					} else if (country == 'HU') {
						var title = 'Az Ön adatvédelme védett';
						var content = 'Oldalunk védi az Ön személyes adatait a rendeletnek megfelelően a személyes adatok védelméről (NAiH). Az Ön személyes adatai a megrendelés feldolgozásához van csak szükségünk. Tájékoztatjuk Önöket, hogy az adatokat tároljuk szervereinken az Egyesült Államokban.Annak érdekében, hogy adatokat tárolhasson az Európai Gazdasági Térségen kívül, szükségünk van beleegyezésére.A beleegyezés önkéntes, de nélküle nem fogjuk tudni teljesíteni a rendelést.';
						var button = 'Egyetértek';
					} else {
						var title = 'Your privacy is important!';
						var content = 'Our website protects your personal data and adhere to the European Union General Data Protection Regulation (GDPR). Your personal data will be used only to process the order. We kindly inform you that we will store your data on our servers located in the United States of America. In order to store your personal data outside of the European Economic Area, we need your consent. The consent is voluntary, but without it, we will not be able to process the order.';
						var button = 'I agree';
					}
					$(document).ready(function () {
						$.fancybox("<div id='ve_gdpr_info' class='clearfix'><h2 class='body-base'>" + title + "</h2><p class='body-16'>" + content + "</p><div class='btn-box'><button id='fancybox-accept-gdpr-button' class='btn btn-md btn-primary'>" + button + "</button></div></div>",
							{
								closeBtn: false,
								closeClick: false,
								helpers: {
									overlay: { closeClick: false }
								},
								keys: {
									close: null
								}
							}
						);

						$('#fancybox-accept-gdpr-button').on('click', function () {
							Cookies.set('vasco_electronics_gdpr_info', 1, { expires: 28 })

							parent.$.fancybox.close();
						});
					})
				}
			},
			function fail(data, status) {
				console.log('Request failed.  Returned status of',
					status);
			}
		);
	}
	if(Cookies.get('vasco_electronics_gdpr_info') == undefined){
		ipLookUp();
	}
});
