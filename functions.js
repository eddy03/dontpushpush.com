'use strict'

const Promise = require('bluebird')
const fs = require('fs')
const path = require('path')
const dot = require('dot')

let func = {}

func.getTemplateContent = () => new Promise((resolve, reject) => {

  // Where is the template?
  const templatePath = path.join(__dirname, 'src', 'index.dot')

  fs.readFile(templatePath, (err, content) => {

    if(err) {
      reject(err)
    } else {
      resolve(content)
    }

  })

})

func.compile = contents => new Promise((resolve, reject) => {



})

func.createHtml = content => Promise((resolve, reject) => {

  const compileTo = path.join(__dirname, 'docs', 'index.html')

  fs.writeFile(compileTo, content, err => {

    if(err) {
      reject(err)
    } else {
      resolve()
    }

  })

})

module.exports = func