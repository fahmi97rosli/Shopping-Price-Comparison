import selenium
from selenium import webdriver
import time
from bs4 import BeautifulSoup
import sys  # using for command Line argument
from selenium.webdriver.chrome.options import Options

# generating url for product
def get_url(item):
    item = item.replace(' ','+')
    item = item.replace('&','%26')
    template = 'https://www.lazada.com.my/catalog/?q={}&_keyori=ss&from=input&spm'
    url = template.format(item)
    return url

# create a function which will fetch the product information
def get_all_products(card):
    pImg = card.find('img','_1YObI')
    product_image = pImg['src']
    product_n = card.find_all('a')
    i=len(product_n)
    product_name = product_n[i-1].text.strip()
    # to remove the ascii (some emoji)
    test_str = product_name.encode('ascii','ignore')
    product_name = str(test_str,'utf-8').strip()
    product_price = card.find('span','Q78Jz').text.strip()
    anchor_tag = card.a.get('href')
    product_buy_link = "https:"+anchor_tag
    product_info = (product_image , product_name , product_price , product_buy_link)
    return product_info

def main(product):
    # set path for chromedriver.exe
    path = 'D:\\driver\\chromedriver.exe'
    
    #records = []
    url = get_url(product)
    
    # hide chrome browser
    
    options = Options()
    options = webdriver.ChromeOptions()
    options.add_argument('headless')
    options.add_argument('--log-level=3')
    
    
    driver = webdriver.Chrome(executable_path=path, options=options)
    driver.get(url)
    driver.maximize_window()
    time.sleep(5)
    '''Define an initial value
    temp_height=0
    
    
    while True:
        #Looping down the scroll bar
        driver.execute_script("window.scrollBy(0,1000)")
        #sleep and let the scroll bar react
        time.sleep(5)
        #Get the distance of the current scroll bar from the top
        check_height = driver.execute_script("return document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;")
        #If the two are equal to the end
        if check_height==temp_height:
            break
        temp_height=check_height
        
    time.sleep(10)
    '''
    
    soup = BeautifulSoup(driver.page_source,'html.parser')
    
    product_cards = soup.find_all('div','_3VkVO')
    
    
    # fetching single product from Shopee
    
    singleCard = product_cards[0]
    
    productDetails = get_all_products(singleCard)
    
    return productDetails


pname = str(sys.argv[1])
scrape_data = main(pname)
# convert tuple into string
final_output = ','.join(scrape_data)
final_output = final_output.encode('utf-8')
print(final_output)