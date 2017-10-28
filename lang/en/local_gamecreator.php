<?php

// general
$string['pluginname'] = 'BCLN Game Creator';
$string['heading'] = 'BCLN Game Creator';
$string['gametype_select'] = 'Select a game type';
$string['next'] = 'Next';
$string['gametitle'] = 'Game title';
$string['gametitle_help'] = 'This title will be displayed at the top of the start screen information window in the game.';
$string['gamedescription'] = 'Game description';
$string['gamedescription_help'] = 'This description will be displayed on the start screen window. You should include what type of questions the user will see.';
$string['creategame'] = 'Create Game';
$string['initialinfo'] = 'This plugin allows developers to create their own versions of exisiting HTML5 games. Start by selecting a game type.';
$string['foldername'] = 'Folder name';
$string['versionexists'] = 'This game name already exists. Please choose a unique name.';


// balloons
$string['balloonsinfo'] = 'You have selected the game type "Balloons", fill out the following information to continue creating your own version of the game. View the help buttons if you are unclear on how to fill out the form.';
$string['balloonsinfo2'] = 'Enter question data for your Balloons game. Do NOT include the answer as one of the options. The options MUST be different than the supplied answer. View the help buttons if you are unclear on how to fill out the form.';
$string['numlevels'] = 'Number of levels';
$string['numquestions'] = 'Number of questions in each level';
$string['option'] = "Option";
$string['question'] = "Question";
$string['answer'] = "Answer";
$string['level'] = 'Level';
$string['speed_increase'] = 'Increase balloon speed';
$string['speed_decrease'] = 'Decrease balloon speed';
$string['speed_no'] = 'No change in speed';
$string['speed'] = 'Balloon speed';
$string['speed_help'] = 'Increasing the balloon speed means that the balloons will reach the top of the screen sooner, and the player will have LESS time to solve the question. Decreasing the balloon speed will make the level easier. Do not increase/decrease the speed too many times, or the game will become unplayable.';
$string['levelname'] = 'Level name';
$string['levelname_help'] = 'This text will appear on the game screen at the beginning of each level. Default is Level (#).';
$string['gametitle_error'] = 'Game title is too long!';
$string['gamedescription_error'] = 'Description is too long!';
$string['missing'] = 'Missing!';
$string['answerinoptions'] = 'Do not include the answer as one of the options!';
$string['duplicate'] = 'Duplicate options are not allowed!';
$string['toolong'] = 'Too long! Please restrict to 6 characters or less.';

// arrange
$string['arrangeinfo'] = 'You have selected the game type "Arrange", input a unique folder name (will not be visible to the user) and select four images in the correct order. The first image being the correct image to place at the bottom, and the last image being the correct image to place in the top box. The images must be of type .jpg, and should be 200x100 pixels.';
$string['image'] = 'Image';

// categories2 and 3
$string['categories2info'] = 'You have selected the game type "Categories2", input a unique folder name (will not be visible to the user). Input the correct answers in the text box. For example if the answers are "category1, category2, category1, category1, category2", you would input "12112". Select two images for the categories (size 195x108), as well as 5 images for the questions (size 150x210). All images must be PNGs. All images will be scaled to the listed sizes, so try to choose similar dimensions.';
$string['categoryimage'] = 'Category image';
$string['questionimage'] = 'Question image';
$string['answer'] = 'Answers';
$string['categoriesheader'] = 'Categories';
$string['questionsheader'] = 'Questions';
$string['categories3info'] = 'You have selected the game type "Categories3", input a unique folder name (will not be visible to the user). Input the correct answers in the text box. For example if the answers are "category1, category2, category1, category3, category2", you would input "12132". Select three images for the categories (size 195x108), as well as 5 images for the questions (size 150x210). All images must be PNGs. All images will be scaled to the listed sizes, so try to choose similar dimensions.';
$string['answers_error'] = "There must be 5 numbers here.";
$string['answers_error2'] = 'Only include the numbers 1 and 2.';
$string['answers_error3'] = 'Only include the numbers 1, 2 and 3.';

// spiderlove
$string['spiderloveinfo'] = 'You have selected the game type "SpiderLove". Input a unique folder name (will not be visible to the user). Input 10 images total. All images must be of type jpg. The recommended image size is 160x75 pixels. The first left image will match with the first right image and so on. The images will be shuffled each time the game is loaded.';
$string['leftimage'] = 'Left image';
$string['rightimage'] = 'Right image';
$string['leftheader'] = 'Left Images';
$string['rightheader'] = 'Right Images';