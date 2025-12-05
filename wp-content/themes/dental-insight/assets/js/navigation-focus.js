var dental_insight_Keyboard_loop = function (elem) {
  var dental_insight_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var dental_insight_firstTabbable = dental_insight_tabbable.first();
  var dental_insight_lastTabbable = dental_insight_tabbable.last();
  dental_insight_firstTabbable.focus();

  dental_insight_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      dental_insight_firstTabbable.focus();
    }
  });

  dental_insight_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      dental_insight_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};