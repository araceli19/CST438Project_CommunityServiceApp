package edu.csumb.dbtest;
//Testing Volnteer Table From AWS Connection
import org.junit.*;
import java.sql.*;
import java.io.IOException;




public class GetCredentials{

  public static String url = "jdbc:mysql://sedatabases.clgz1qavgh08.us-west-2.rds.amazonaws.com:3306/";
  public static String userName = "seclass";
  public static String password = "sedb1234";
  public static String dbName = "Community_Service_Finder";
  public static String driver = "com.mysql.jdbc.Driver";

public GetCredentials(){

}

  public String getUrl(){
    return url;
  }
  public String getUserName(){
    return userName;
  }
  public String getDbName(){
    return dbName;
  }
  public String getDriver(){
    return driver;
  }
  public String getPassword(){
    return driver;
  }


}
