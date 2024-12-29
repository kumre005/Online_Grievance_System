<!doctype html>
<html lang="en-gb"><head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta name="format-detection" content="telephone=no" />
    
   <link href="https://supfort.com/demo/pure-css-accordion-plus-minus-signs/" rel="canonical" />
   <meta charset="utf-8" />
	<base href="https://supfort.com/demo/pure-css-accordion-plus-minus-signs/" />
	<meta name="robots" content="index, follow" />
	<meta name="author" content="Luis Posselt" />
	<meta name="generator" content="Website powered by Supfort.com Engines" />
    
	<title>DEMO: Pure CSS accordion with plus and minus toggle signs</title>
    
	<link href="https://ds86ezgzhjiyh.cloudfront.net/templates/supfort/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    
	<meta name="twitter:title" content="DEMO: Pure CSS accordion with plus and minus toggle signs">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="DEMO: Learn how to build a pure CSS accordion with plus and minus toggle signs.">
    <meta name="twitter:imagew" content="https://ds86ezgzhjiyh.cloudfront.net/images/2019/february/adding-toggle-plus-and-minus-signs-pure-css-accordion.jpg">
    
    <meta property="og:description" content="DEMO: Learn how to build a pure CSS accordion with plus and minus signs."/>
    <meta property="og:image" content="https://ds86ezgzhjiyh.cloudfront.net/images/2019/february/adding-toggle-plus-and-minus-signs-pure-css-accordion.jpg"/>
    
<style>

/* GENERAL STYLES  - NOT NEEDED*/

h1 {
    font-size: 20px;
    text-align: center;
    margin: 20px 0 20px 0;
}
h2 {
    font-size: 18px;
    text-align: center;
    margin: 20px 0 20px 0;
}

h1 + p {
	text-align: center;
}

h1 + p a, .redly {
    background: #b93232;
    color: #FFF;
    text-decoration: none;
    display: block;
    margin: 0 auto 22px auto;
    width: 140px;
    text-align: center;
    padding: 6px 14px 8px 14px;
    border-radius: 3px;
}
.redly.wider {
    width: 75%;
	background: #3285b9;
}

/* NEEDED STYLES */
label {
    display: block;    
	padding: 8px 22px;
    margin: 0 0 1px 0;
	cursor: pointer;
	background: #6AAB95;
	border-radius: 3px;
	color: #FFF;
	transition: ease .5s;
	position: relative;
}
label:hover {
	background: #4E8774;
}

label::after {
    content: '+';
    font-size: 22px;
    font-weight: bold;
    position: absolute;
    right: 10px;
    top: 2px;
}

input:checked + label::after {
    content: '-';
    right: 14px;
    top: 3px;
}

.content {
    background: #E2E5F6;
    padding: 10px 25px;
    border: 1px solid #A7A7A7;
	margin: 0 0 1px 0;
	border-radius: 3px;
}

input + label + .content {
	display: none;
}

input:checked + label + .content {
	display: block;
}

input {
	display: none;
}

</style>
</head>

<body>

<div class="mobilefooter">
<input type="checkbox" id="title1" />
<label for="title1">Accordion One </label>

<div class="content">

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

</div>

<input type="checkbox" id="title2" />
<label for="title2">Accordion Two </label>

<div class="content">

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

</div>

<input type="checkbox" id="title3" />
<label for="title3">Accordion Three </label>

<div class="content">

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

</div>
</div>



</body>
</html>




