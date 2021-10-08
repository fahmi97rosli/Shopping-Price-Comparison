import selenium
from selenium import webdriver
import time
from bs4 import BeautifulSoup
import sys  # using for command Line argument
from selenium.webdriver.chrome.options import Options

# generating url for product
def get_url(product):
    product = product.replace(' ','%20')
    template = 'https://shopee.com.my/search?keyword={}'
    url = template.format(product)
    return url

# create a function which will fetch the product information
def get_all_products(card):
    pImg = card.find('img')
    product_image = pImg['src']
    product_name = card.find('div','_10Wbs- _5SSWfi UjjMrh').text.strip()
    # to remove the ascii (some emoji)
    test_str = product_name.encode('ascii','ignore')
    product_name = str(test_str,'utf-8').strip()
    product_price = card.find('span','_1d9_77').text.strip()
    anchor_tag = card.a.get('href')
    product_buy_link = 'https://shopee.com.my'+anchor_tag
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
    time.sleep(3)
    btn = driver.find_element_by_xpath('//*[@id="modal"]/div[1]/div[1]/div/div[3]/div[1]/button')
    btn.click()
    time.sleep(7)
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
    
    product_cards = soup.find_all('div','col-xs-2-4')
    
    
    # fetching single product from Shopee
    
    singleCard = product_cards[2]
    
    productDetails = get_all_products(singleCard)
    
    return productDetails


pname = str(sys.argv[1])
scrape_data = main(pname)
# convert tuple into string
final_output = ','.join(scrape_data)
final_output = final_output.encode('utf-8')
print(final_output)