//Araceli Gopar

package edu.csumb.dbtest;
//Testing Volnteer Table From AWS Connection
import org.junit.*;
import java.sql.*;
import java.io.IOException;

public class IdVolunteersTableIT {

@Test
public void testingRediction(){
  GetCredentials awsConnection = new GetCredentials();
  //credentials are in separate file
   Connection conn = null;
Statement stmt = null;
      Statement st = null;
    try{
    //STEP 2: Register JDBC driver
      Class.forName("com.mysql.jdbc.Driver");
        conn =  DriverManager.getConnection(awsConnection.getUrl() + awsConnection.getDbName(),
                                            awsConnection.getUserName(), awsConnection.getPassword());
//**********************TEST 1 *****************************************
      System.out.println("***********Connecting database to Table***********");
      String query = "SELECT * FROM Volunteer";
      st = conn.createStatement();
      ResultSet rs = st.executeQuery(query);



      // iterate through the java resultset
      while (rs.next())
      {
        int id = rs.getInt("ID");
        String name = rs.getString("Name");
        String dOB = rs.getString("DOB");
        String school = rs.getString("School");
        String school_ID = rs.getString("School_ID");
        double hours = rs.getInt("Hours");
        String phone = rs.getString("Phone_Num");

        // print the results
        System.out.println(id + " " + name+ " " + dOB+ " " +  school + " " + school_ID+ " " +  hours+ " " + phone);
      }
      st.close();

     System.out.println("***********Connecting database***********");



        System.out.println("***********Created table in database***********");
    }catch(SQLException se){
    //Handle errors for JDBC
            se.printStackTrace();
    }catch(Exception e){
    //Handle errors for Class.forName
          e.printStackTrace();
    }finally{
    //finally block used to close resources
    try{
      if(stmt!=null)
        conn.close();
    }catch(SQLException se){
    }// do nothing
      try{
        if(conn!=null)
        conn.close();
    }catch(SQLException se){
            se.printStackTrace();
    }//end finally try
    }//end try
            System.out.println("Goodbye!");
}

@Test
public void test() {


    GetCredentials awsConnection = new GetCredentials();
    //credentials are in separate file
    Connection conn = null;
    Statement stmt = null;
    try{
      //STEP 2: Register JDBC driver
      Class.forName("com.mysql.jdbc.Driver");
//**********************TEST 1 *****************************************
      System.out.println("***********Connecting database to Table***********");

      conn =  DriverManager.getConnection(awsConnection.getUrl() + awsConnection.getDbName(),
      awsConnection.getUserName(), awsConnection.getPassword());

      System.out.println("***********Connected database successfully***********");

      //STEP 4: Execute a query
      System.out.println("***********Creating table in given database***********");
      stmt = conn.createStatement();


      String sql = "CREATE TABLE USERS " +
          "(ID INT not NULL," +
          " LASTNAME VARCHAR(255) not NULL," +
          " NAME VARCHAR(255) not NULL,"+
          "PRIMARY KEY (ID))";

          //stmt.cre
      stmt.execute(sql);



          System.out.println("***********Created table in database***********");
      }catch(SQLException se){
      //Handle errors for JDBC
              se.printStackTrace();
      }catch(Exception e){
      //Handle errors for Class.forName
            e.printStackTrace();
      }finally{
      //finally block used to close resources
      try{
        if(stmt!=null)
          conn.close();
      }catch(SQLException se){
      }// do nothing
        try{
          if(conn!=null)
          conn.close();
      }catch(SQLException se){
              se.printStackTrace();
      }//end finally try
      }//end try
              System.out.println("Goodbye!");
      }//end main


}
