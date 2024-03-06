var parag1 = 'I\'m <b>highly motivated and skillful on Node.js</b> programming language.<br />\n' +
  '<b>Love to try</b> newest and latest technology stack in web programming and <b>solving new problems.</b> ' +
  'I also love to build something minimal but deliver highest quality and also <b>lower cost to operate</b>. <br>' +
  'Full Stack programmer with knowledge of jQuery (soo old), ReactJS (Primary), bootstrap, SASS, and mostly on <b>Node.js environment</b>.\n' +
  'Know about MySQL (RDS), and MongoDB, Redis (noSQL). ' +
  'AWS, Linode, Digital Ocean, Google Cloud Platform user. <br> <br>'

var parag2 = parag1 + '<b>My biggest achievements</b> is my own personal SAAS (Software As A Service) called <a href="https://bizsaya.com" target="_blank">Bizsaya</a> ' +
  'that is used to assist online seller to automated some part for their FB pages. ' +
  'Currently i\'m developing, maintaining and supporting the product. Alone. <br><br>'

var parag3 = parag2 + 'If you would like to review my code, Head over to <a href="https://github.com/eddy03" target="_blank">my github</a> and <a href="https://gitlab.com/eddytech">my gitlab</a>.<br>' +
  'Or if you like to keep in touch, Visit my facebook.. Oh wait? what? Facebook.. That un-professional...'

var parag4 = parag3.replace('facebook.. Oh wait? what? Facebook.. That un-professional...', '') + '<a href="https://www.linkedin.com/in/edi-abdul-rahman" target="_blank">LinkendIn</a>. <br><br>'

var parag5 = parag4 + 'Or you prefer to direct contact with me? mail to <a href="mailto:eddytech03@gmail.com">eddytech03@gmail.com</a>'

new Typed('.description', {
  strings: [
    parag1,
    parag2,
    parag3,
    parag4,
    parag5
  ],
  typeSpeed: 10,
  showCursor: false
})

var element = document.getElementById('debug');
if (element) {
  console.debug('element found')
  element.innerHTML = JSON.stringify(window.location.search || '')
} else {
  console.debug('element not found')
}
