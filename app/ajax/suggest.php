<?php

$subjects = get('subjects');
$courses = [];

$q = 'SELECT c.name, c.subjects, c.department FROM courses as c WHERE 1 ORDER BY c.name ASC';
$_courses = $db->query($q)->fetch_assoc_all();

foreach ($_courses as $course) {
  // Creates an array from the subject index of a course array
  $_subjects = explode(',',$course['subjects']);
  $found = 0; // Stores the number of subjecst found in a course

  foreach ($_subjects as $_subject) {

    $s = $_subject !== 'IRS/CRS' && strchr($_subject, '/') ? explode('/', $_subject) : $_subject;

    if(is_array($s)) {

      foreach($s as $_s) {
        if(in_array($_s, $subjects)) {
          $found++;
          break;
        }
      }

    } else if(is_string($s)) {
      if(in_array($s, $subjects)) $found++;
    }
  }

  if ($found > 4) {
    $courses[] = $course;
  }
}

// Makes sure that the reieved subjects array are striped off _ in between
// For proper visualization
$_mappedSubjects = [];
foreach ($subjects as $subj) {
  $_mappedSubjects[] = ucwords(trim(implode(' ', explode('_', $subj))));
}
$response['subjects'] = implode(', ', $_mappedSubjects);

if(count($courses) > 0) {
  $_courses = [];
  $_mapped = [];
  foreach ($courses as $_course) {
    $_mapped['name'] = ucwords( trim( implode( ' ', explode('_', $_course['name']) ) ) );

    $_mapped['department'] = ucwords($_course['department']);

    $_subjects = explode(',',$_course['subjects']);
    $sub = [];
    foreach ($_subjects as $_subject) {
      $sub[] = trim( ucwords( implode(' / ', explode('/', implode(' ', explode('_', $_subject) ) ) ) ) );
    }

    $_mapped['subjects'] = implode(' , ', $sub);

    $_courses[] = $_mapped;
  }

  $courses = $_courses;
}
$response['courses'] = $courses;

$ajax_response = $response;
