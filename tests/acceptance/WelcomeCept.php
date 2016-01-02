<?php 


$I = new AcceptanceTester($scenario);
$I->wantTo('codeschool login page');
$I->amOnPage('users/sign_in');
$I->fillField('user[login]', 'developer@netlioo.com');
$I->fillField('user[password]', 'netlioo123');
$I->click('Sign In');
$I->see('Dashboard - Code School','title');


$I->wantTo('get codeschool courses page');
$I->amOnPage('paths');

$I->wantTo('get database course detail');
$I->amOnPage('paths/database');






//$aLinkText[] = $I->grabMultiple('a','.course-title-link');

//$x[] = $I->seeElement('a', ['class' => 'course-title-link']);

//$x[] = $I->grabAttributeFrom('.course-title-link', 'a');


$basePath = 'https://www.codeschool.com/';
$videos = '/videos';
$texts = $I->grabMultiple('a.course-title-link');
$hrefs = $I->grabMultiple('a.course-title-link','href');


//Download HD Quality


foreach($hrefs AS $link){
	$desiredLink = $link.$videos;
	$I->amOnPage($desiredLink);
	$videoHrefs = $I->grabMultiple('a.js-level-open','href');
	
	foreach($videoHrefs AS $video) {
		$I->wantTo('get real video paths');

		$I->amOnUrl($basePath.$link.$videos.$video);
		$realVideoLink = $I->grabMultiple('iframe.hidden-iframe','src');

		dd($realVideoLink);
	}
		 
}



function dd($val){
 echo '<pre>'; print_r($val); die;
}





//https://www.codeschool.com/courses/try-sql


