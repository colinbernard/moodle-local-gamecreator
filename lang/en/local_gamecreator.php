<?php
// access
$string['gamecreator:viewplugin'] = "Use the Game Creator plugin.";


// general
$string['pluginname'] = 'WCLN Game Creator';
$string['heading'] = 'WCLN Game Creator';
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
$string['image'] = 'Image';
$string['title'] = 'Title';
$string['author'] = 'Your name';
$string['category'] = 'Category';
$string['platform'] = 'Platform';
$string['description'] = 'Description';
$string['submit'] = 'Submit';
$string['email'] = 'Email';


// balloons
$string['balloonsinfo1'] = 'You have selected the game type "Balloons", fill out the following information to continue creating your own version of the game. View the help buttons if you are unclear on how to fill out the form.';
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
$string['arrangeinfo'] = 'You have selected the game type "Arrange", input a unique folder name (will not be visible to the user) and select four images in the correct order. The first image being the correct image to place at the top, and the last image being the correct image to place in the bottom box. The images must be of type .jpg or .png, and should be approximately 200x100 pixels.';

// categories2 and 3
$string['categories2info'] = 'You have selected the game type "Categories2", input a unique folder name (will not be visible to the user). Input the correct answers in the text box. For example if the answers are "category1, category2, category1, category1, category2", you would input "12112". Select two images for the categories (size 195x108), as well as 5 images for the questions (size 150x210). All images must be .png or .jpg. All images will be scaled to the listed sizes, so try to choose similar dimensions.';
$string['categoryimage'] = 'Category image';
$string['questionimage'] = 'Question image';
$string['answer'] = 'Answers';
$string['categoriesheader'] = 'Categories';
$string['questionsheader'] = 'Questions';
$string['categories3info'] = 'You have selected the game type "Categories3", input a unique folder name (will not be visible to the user). Input the correct answers in the text box. For example if the answers are "category1, category2, category1, category3, category2", you would input "12132". Select three images for the categories (size 195x108), as well as 5 images for the questions (size 150x210). All images must be .png or .jpg. All images will be scaled to the listed sizes, so try to choose similar dimensions.';
$string['answers_error'] = "There must be 5 numbers here.";
$string['answers_error2'] = 'Only include the numbers 1 and 2.';
$string['answers_error3'] = 'Only include the numbers 1, 2 and 3.';

// spiderlove
$string['spiderloveinfo'] = 'You have selected the game type "SpiderLove". Input a unique folder name (will not be visible to the user). Input 10 images total. All images must be of type .jpg or .png. The recommended image size is 160x75 pixels. The first left image will match with the first right image and so on. The images will be shuffled each time the game is loaded.';
$string['leftimage'] = 'Left image';
$string['rightimage'] = 'Right image';
$string['leftheader'] = 'Left Images';
$string['rightheader'] = 'Right Images';

// venn diagram
$string['venndiagraminfo1'] = 'You have selected the game type "Venn Diagram". Input a unique version name (which will be visible to the user). Enter a short description for the game which will be shown on the start screen. Then select the number of questions and the number of questions per level.';
$string['venndiagraminfo2'] = 'For each question you provide, also enter two options (one for each side of the Venn diagram) as well as selecting the correct answer to the question.';
$string['right'] = 'Right';
$string['left'] = 'Left';
$string['neither'] = 'Neither';
$string['both'] = 'Both';
$string['questions_per_level'] = "Questions per level";
$string['numquestions_venn'] = 'Number of questions';
$string['gametitle_venn_help'] = "This title should be unique. It will be displayed in the URL and at the top of the browser window, but will not appear in the actual game anywhere.";
$string['gametitle_venn'] = "Game title";
$string['venn_answer'] = "Answer";

// image labelling
$string['imagelabelsinfo'] = 'You have selected the game type "Image Labelling". Input a unique version name (which will not be visible to the user). Also enter the number of questions (labels) that your game will include. You will be able to upload a main picture which the user will be labelling on the next form.';
$string['imagelabelsinfo2'] = 'Upload a picture (jpg or png) that is approximately 350x350 pixels. This picture should be labelled with letters A-F. You can find a picture on Google images and then add labels using Photoshop or a similar image editing software. You will also need to enter a term (question) and select the correct answer.';
$string['image_labels_answer'] = 'Answer';
$string['numbuttons'] = "Number of Buttons (Labels)";
$string['numbuttons_help'] = "This is the number of buttons at the bottom of the screen. If the image you will be using has A-F labels, you should choose to have A-F buttons at the bottom.";

// invaders
$string['invadersinfo'] = 'You have selected the game type "Invaders", fill out the following information to continue creating your own version of the game. View the help buttons if you are unclear on how to fill out the form.';
$string['invadersinfo2'] = 'Enter question data for your Invaders game. Do NOT include the answer as one of the options. The options MUST be different than the supplied answer. View the help buttons if you are unclear on how to fill out the form.';

// memory
$string['memoryinfo'] = 'You have selected the game type "Memory". You must provide 10 images (5 pairs). The images must be of type JPG. Enter a folder name to identify this game. This folder name will not be visible when playing the game.';
$string['pair'] = 'Pair';

// multiple choice
$string['multiplechoiceinfo'] = 'You have selected the game type "Multiple Choice Quiz". Enter a title and description for your quiz. You will need to provide text based questions each with 1 answer and 3 incorrect options. On this page, specify the number of questions you will be adding. You will be unable to use this tool to add more questions later or remove questions. For each question, you will be able to provide an optional question image as well.';
$string['multiplechoiceinfo2'] = 'Provide question information. For each question section: provide the question text, JPG or PNG question image (optional), answer, and 3 incorrect options. The answer and options will be shuffled for each question so the order they are provided in makes no difference. However, the order the questions are provided in will remain the same.';
$string['quiztitle'] = 'Quiz title';
$string['quiztitle_help'] = 'The quiz title will be displayed at the top of the quiz window throughout the quiz duration. It will also be visible in the quiz URL.';
$string['quiztitle_error'] = 'Quiz title is too long!';
$string['numquestionsquiz'] = 'Number of questions';
$string['quizinstructions'] = 'Quiz instructions';
$string['quizinstructions_help'] = 'The description will be shown on the start page and should tell the user how the quiz works, as well as the material they should expect to be quizzed on.';
$string['quizinstructions_error'] = 'Quiz instructions are too long!';
$string['createquiz'] = 'Create Quiz';
$string['questionimage'] = 'Question Image';
