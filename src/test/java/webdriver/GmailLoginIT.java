/*
	Noemi Cuin
*/

import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;

import org.junit.*;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class GoogleLoginIT
{

	WebDriver driver = new ChromeDriver();

	@Before
	public void create()
	{
		driver.get("http://localhost:8080/html/home.html");
	}

	@After
	public void destroy()
	{
		driver.quit();
	}

	@Test //make sure Login button functions properly
	public void testGmail()
	{
		driver.findElement(By.id("Login")).click();
		driver.findElement(By.id("email")).sendKeys("greatestever319@gmail.com"));
		driver.findElement(By.id("password")).sendKeys("science831!"));

		assertTrue(driver.findElement(By.id("email")).equals("greatestever319@gmail.com"));

	}

	@Test //information is received
	public void testReceive()
	{
		driver.findElement(By.id("Get Info")).click();
		driver.findElement(By.id("email").sendKeys("greatestever319@gmail.com"));
		assertTrue(driver.findElement(By.id("email")).equals("greatestever319@gmail.com"));
	}

}