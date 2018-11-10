;(function($){
  var $resultContainer = $('.r-container'),

  $forgotPasswordForm = $('.forgot-password form'),

  $suggestResultContainer = $('.result.container'),

  waitingNode = '<div class="loader text-center" style="color: #fefefe">' +
    'Please Wait...' +
  '</div>',

  $suggestForm = $('#suggestForm'),

  buildSuggestResultNode = function (data) {
    console.log(data)

    var courseLength = data.courses.length,

    totalCourses = courseLength > 1 ? courseLength + ' results' : courseLength + ' result' ,

    _node = '<div class="">' +
      '<div class="col-12">' +
        '<span class="selected d-block pt-2" style="color: #fefefe">'+
          totalCourses + ' found for selected courses: ' + data.subjects +
        '</span>' +
      '</div>';


    for (var i = 0; i < data.courses.length; i++) {
      var _course = data.courses[i]

      if(i === 0) {
        _node += '<div class="row courses-cont p-3">';
      } else if (i % 3 === 0) {
        _node += '</div><div class="row courses-cont p-3">';
      }

      _node += '<div class="col-sm-4">' +
        '<div class=" course list-item py-2 px-3">' +
          '<span class="d-block">Course: <strong>' + _course['name'] + '</strong></span>' +
          '<span class="d-block">Department: <strong>'+ _course['department'] + '</strong></span>' +

          '<span class="d-block">' +
            '<small>' +
              'Subjects: <strong><em>' + _course['subjects'] + '</em></strong>' +
            '</small>' +
          '</span>' +
        '</div>' +
      '</div>'


      if(i === data.courses.length) {
        _node += '</div>'
      }
    }

    _node += '</div>';
    return _node;

  },

  buildResultNode = function (subjects, course) {
    var _nodes = '<div class="result d-inline-block p-3">' +
      '<h5 class="pb-2"> Required subjects for <em>' + course + '</em> </h5>' +
      '<div class="r-courses mt-1">';

    for ( var i = 0;  i < subjects.length; i++ ) {
        _nodes += '<span class="result-item p-2 mx-1 ">'+ subjects[i] + '</span>';
    }

    _nodes += '</div>' + '</div>';
    return _nodes;
  },

  updateResultContainer = function(node, container) {
    container.removeClass('hidden').html('').text('').html(node)
  }

  if($('.course.list-item').length > 0) {
    $('.course.list-item').on('click', function(evt) {
      evt.preventDefault();

      updateResultContainer(waitingNode, $resultContainer);

      var url = base_url + 'ajax-courses';

      var jqXhr = $.ajax({
        url: url,
        type:'get',
        data: {name: $(this).data('name')},
      })

      jqXhr.success(function(data) {
        data = JSON.parse(data)
        updateResultContainer(buildResultNode(data.subjects, data.course), $resultContainer)
        
      })
    });
  }

  if($suggestForm.length > 0) {

    $suggestForm.submit(function(evt) {
      evt.preventDefault();

      if($('#suggestForm input:checked').length === 0) return;

      var formData = $(this).serialize();

      updateResultContainer(waitingNode, $suggestResultContainer);

      var url = base_url + 'ajax-suggest';


      var jqXhr = $.ajax({
        url: url,
        type:'get',
        data: formData,
      })

      jqXhr.success(function(data) {
        data = JSON.parse(data);
        // data = JSON.parse(data)

        updateResultContainer(buildSuggestResultNode(data), $suggestResultContainer);
      })
    })
  }

  if($forgotPasswordForm.length > 0) {
    $forgotPasswordForm.submit(function(evt) {
      $('.p-error').fadeOut('fast');
      var password = $forgotPasswordForm.find('.password'),
      rPassword = $forgotPasswordForm.find('.r-password');
      if(password.val() !== rPassword.val()) {
        evt.preventDefault();
        $('.p-error').fadeIn();
        return false;
      }

      return true;
    })
  }

  setTimeout(function() {
    $('.alert').each(function() {
      $(this).fadeOut('fast')
    })
  }, 15000)

})(jQuery)
