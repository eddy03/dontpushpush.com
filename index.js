'use strict'

const compiler = require('./functions')

compiler.getTemplateContent()
  .then(compiler.createHtml)
  .catch(err => {
    console.error(err)
  })




// const index = dot.template()
//
//
//
//
// const jsonfile = require('jsonfile')
// const dots = require('dot').process({ path: './src' })
//
// const file = dots.index(jsonfile.readFileSync('./data.json'))


