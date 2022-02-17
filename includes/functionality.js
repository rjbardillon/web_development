function EnableRaceOne(check) {
  var input = document.getElementById('race1')
  input.disabled = check.checked ? false : true
  if (!input.disabled) {
    input.focus()
  }
}

function EnableRaceTwo(check) {
  var input = document.getElementById('race2')
  input.disabled = check.checked ? false : true
  if (!input.disabled) {
    input.focus()
  }
}

function EnableRaceThree(check) {
  var input = document.getElementById('race3')
  input.disabled = check.checked ? false : true
  if (!input.disabled) {
    input.focus()
  }
}

function EnableRaceFour(check) {
  var input = document.getElementById('race4')
  input.disabled = check.checked ? false : true
  if (!input.disabled) {
    input.focus()
  }
}

function numbersOnly(input) {
  var regex = /[^0-9]/gi
  input.value = input.value.replace(regex, '')
}

function enableEditingQ1(check) {
  var textbox = document.getElementById('q1')
  if (check.value == 'edit') {
    textbox.removeAttribute('readonly')
  }
}

function enableEditingQ2(check) {
  let btn = document.createElement('button')
  btn.innerHTML = 'save'
  btn.type = 'submit'
  btn.name = 'save'
  document.getElementById("q2").appendChild(btn)
  var o1 = document.getElementById('o1')
  var o2 = document.getElementById('o2')
  var o3 = document.getElementById('o3')
  var o4 = document.getElementById('o4')
  var o5 = document.getElementById('o5')
  if (check.value == 'edit') {
    o1.removeAttribute('disabled')
    o2.removeAttribute('disabled')
    o3.removeAttribute('disabled')
    o4.removeAttribute('disabled')
    o5.removeAttribute('disabled')
  }
}

function enableEditingQ3(check) {
  var q3o1 = document.getElementById('q3o1')
  var q3o2 = document.getElementById('q3o2')
  var q3o3 = document.getElementById('q3o3')
  var q3o4 = document.getElementById('q3o4')
  if (check.value == 'edit') {
    q3o1.removeAttribute('disabled')
    q3o2.removeAttribute('disabled')
    q3o3.removeAttribute('disabled')
    q3o4.removeAttribute('disabled')
  }
}

function enableEditingQ4(check) {
  var textbox = document.getElementById('phone')
  if (check.value == 'edit') {
    textbox.removeAttribute('readonly')
  }
}

function enableEditingQ5(check) {
  var firstName = document.getElementById('fName')
  var MI = document.getElementById('MI')
  var lastName = document.getElementById('lName')
  if (check.value == 'edit') {
    firstName.removeAttribute('readonly')
    MI.removeAttribute('readonly')
    lastName.removeAttribute('readonly')
  }
}

function enableEditingQ6(check) {
  var male = document.getElementById('male')
  var female = document.getElementById('female')
  if (check.value == 'edit') {
    male.removeAttribute('disabled')
    female.removeAttribute('disabled')
  }
}

function enableEditingQ7(check) {
  var textbox = document.getElementById('q7')
  if (check.value == 'edit') {
    textbox.removeAttribute('readonly')
  }
}

function enableEditingQ8(check) {
  var q8o1 = document.getElementById('q8o1')
  var q8o2 = document.getElementById('q8o2')
  var q8o3 = document.getElementById('q8o3')
  var q8o4 = document.getElementById('q8o4')
  var chinese = document.getElementById('chinese')
  var vietnamese = document.getElementById('vietnamese')
  var native_hawaiian = document.getElementById('native-hawaiian')
  var filipino = document.getElementById('filipino')
  var korean = document.getElementById('korean')
  var samoan = document.getElementById('samoan')
  var indian = document.getElementById('indian')
  var japanese = document.getElementById('japanese')
  var chamorro = document.getElementById('chamorro')
  var race1 = document.getElementById('race1')
  var race2 = document.getElementById('race2')
  var race3 = document.getElementById('race3')
  var race4 = document.getElementById('race4')
  if (check.value == 'edit') {
    q8o1.removeAttribute('disabled')
    q8o2.removeAttribute('disabled')
    q8o3.removeAttribute('disabled')
    q8o4.removeAttribute('disabled')
    chinese.removeAttribute('disabled')
    vietnamese.removeAttribute('disabled')
    native_hawaiian.removeAttribute('disabled')
    filipino.removeAttribute('disabled')
    korean.removeAttribute('disabled')
    samoan.removeAttribute('disabled')
    indian.removeAttribute('disabled')
    japanese.removeAttribute('disabled')
    chamorro.removeAttribute('disabled')
  }
}
