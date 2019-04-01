# webapp-mirko
App with href comparison from two different urls

How this app works:
- retrieve the href attributes within all the anchor tags on both homepage urls provided by the user
- crawl both websites by one level depth, and retrieve the href attributes within all the anchor tags found on the crawled pages
- aggregate all the inbound links (hrefs pointing to the same domain) found in the two domains into two different arrays
- compare the links in the two arrays, and for each link in the first array find the most similar link in the second array
- force the client browser to download a csv file having on each row: 
url from the first domain, url from the second domain, percentage of similarity between the two strings


The output will look like the following:

http://www.gazzetta.it, http://www.tuttosport.com, 100.00%

http://www.gazzetta.it/messi-all-inter, http://www.tuttosport.com/l-inter-compra-messi, 46.00%

http://www.gazzetta.it/udinese-esonerato-massimo-oddo, http://www.tuttosport.com/massimo-oddo-lascia-l-udinese, 55.00%

http://www.gazzetta.it/il-napoli-vince-lo-scudetto, http://www.tuttosport.com/grande-sarri-scudetto-al-napoli, 21.66%


