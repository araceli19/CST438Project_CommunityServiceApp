
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;

import org.junit.*;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

/*
 * Created by Lesly Garcia 11/7/16.
 */

public class FacebookLoginIT {
    // Requires chromedriver
    WebDriver driver = new ChromeDriver();

    @Before //set up server
    public void setUp() {
        driver.get("http://localhost:8080/html/home.html");
    }

    @After
    public void tearDown() {
        driver.quit();
    }

    @Test //test that Login button works correctly
    public void testLogin() {
        driver.findElement(By.id("Login")).click();
        driver.findElement(By.id("phone").sendKeys("8312623191")); //check phone number
        driver.findElement(By.id("password").sendKeys("science831!")); //check email
        assertTrue(driver.findElement(By.id("phone")).equals("8312623191"));
    }

    @Test //test data receiver
    public void testGetInfo() {
      driver.findElement(By.id("Get Info")).click();
      driver.findElement(By.id("id").sendKeys("141777212964261")); //receive name, id
      assertTrue(driver.findElement(By.id("id")).equals("141777212964261"));
    }

}
