/*
	Noemi Cuin & Araceli Gopar
*/
package webdriver;
import org.openqa.selenium.By;
import static org.junit.Assert.*;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.WebDriverWait;
import java.util.List;
import java.util.concurrent.*;
import org.junit.*;
import static org.hamcrest.CoreMatchers.containsString;


public class GmailLoginIT
{
  WebDriver driver = new ChromeDriver();

	@Before
	public void create()
	{
		driver.get("https://accounts.google.com/AddSession?sacu=1&btmpl=authsub&continue=https%3A%2F%2Faccounts.google.com%2Fo%2Foauth2%2Fauth%3Faccess_type%3Donline%26approval_prompt%3Dauto%26scope%3Demail%2Bprofile%26response_type%3Dcode%26redirect_uri%3Dhttp%3A%2F%2Fsample-env.8fm6rg3smv.us-west-2.elasticbeanstalk.com%2Findex.php%26client_id%3D23817671136-knscbm6p1l4aj046g7dun6hva9ovg1v2.apps.googleusercontent.com%26from_login%3D1%26as%3D-7a51c1ddf8132052#identifier");
	}

	@After
	public void destroy()
	{
		  driver.close();
    //  return true;

	}
  /*@Test
  public testSuccessButtonClick(){
  //  driver.findElement(By.id("enter")).click();
    //driver.manage().timeouts().implicitlyWait(5, TimeUnit.SECONDS);
  }
*/
	@Test //make sure Login button functions properly
	public void testGmailLoginWithPermission()
	{
    WebElement element = driver.findElement(By.id("Email"));
    element.sendKeys("greatestever319@gmail.com");

    //wait 5 secs for  userid to be entered

    driver.manage().timeouts().implicitlyWait(5, TimeUnit.SECONDS);
    driver.findElement(By.id("next")).click();
    //Enter Password
    WebElement element1 = driver.findElement(By.id("Passwd"));
    element1.sendKeys("science831!");
    //Submit button
    driver.findElement(By.id("signIn")).click();

    String bodyText = driver.findElement(By.tagName("body")).getText();
    assertThat(bodyText, containsString("BashingPumpkins"));


    driver.manage().timeouts().implicitlyWait(20, TimeUnit.SECONDS);

	}
  @Test //make sure Login button functions properly
  public void testGmailConnection(){
    //initialize Chrome driver
        //   System.setProperty("webdriver.chrome.driver", "C:\\selenium-java-2.35.0\\chromedriver_win32_2.2\\chromedriver.exe");
            WebDriver driver = new ChromeDriver();

            //Open gmail
            driver.get("http://www.gmail.com");

            // Enter userd id
            WebElement element = driver.findElement(By.id("Email"));
            element.sendKeys("greatestever319@gmail.com");

            //wait 5 secs for  userid to be entered
            driver.manage().timeouts().implicitlyWait(5, TimeUnit.SECONDS);
            driver.findElement(By.id("next")).click();
            //Enter Password
            WebElement element1 = driver.findElement(By.id("Passwd"));
            element1.sendKeys("science831!");

            //Submit button
          driver.findElement(By.id("signIn")).click();
          driver.close();

    }


}
