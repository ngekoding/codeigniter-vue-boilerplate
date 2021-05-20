const meta = document.getElementsByTagName('meta')

let baseUrl = meta['base-url']['content']

// Remove http/https prefix
baseUrl = baseUrl.replace(/htt(p|ps):\/\//gi, "");

// Find first slash position to remove domain name
const slashIndex = baseUrl.indexOf('/')
baseUrl = baseUrl.substring(slashIndex)

const siteUrl = baseUrl + 'index.php'

export {
  baseUrl,
  siteUrl
}
