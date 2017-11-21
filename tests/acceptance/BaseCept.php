<?php

$I = new AcceptanceTester( $scenario );

$I->wantTo( 'Ensure that home page works' );
$I->amOnPage( '/' );

$I->see( 'Just another WordPress site' );
$I->makeScreenshot( 'success-home' );
