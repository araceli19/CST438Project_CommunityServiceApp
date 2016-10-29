

import org.junit.*;

import java.io.IOException;

import static org.junit.Assert.*;

/**
 * 
 */
public class IdDataTableIT {
    private static final String TABLE_NAME = "Volunteer";
    private DBController controller;
    private IdDataTable table;
    @Before
    public void ConnectToDB() throws IOException{
        controller = new DBController();
        table = new IdDataTable(TABLE_NAME, controller);
        table.dropTable();
        table.createTable();
    }
    @After
    public void disconnect(){
        table.dropTable();
        controller.close();
    }

    /*
        Create movie wait for confirmation from AWS
     */
    @Test
    public void createNewMovie(){
        assertNotEquals(table.insert("Anna"), -1);
    }


    /*
        Create movie and then check to see if the movie exists by comparing dataStored
     */
    @Test
    public void createAndVerifyMovie(){
        String Name = table.insert("Elsa");
        String DOB = table.insert("10/30/2000");
        Striing School = table.insert("La Vista");
        int School_ID = table.insert(133);
        double Hours = table.insert(3.4);
        String  Phone_Num = table.insert("(831)444-222");

        String data = table.get(Name);

        assertTrue(data.equals("Elsa"));
      //  assertTrue()
    }

    /*
        Create movie, then delete the movie, then make sure that the row does not exist
     */
    @Test
    public void deletedMovie(){
        int ID = table.insert(5);

        table.delete(id);

        assertNull(table.get(id));
    }

    /*
        Create movie entry, update dataStored, make sure the update held
     */
    @Test
    public void updateMovieRecordConfirm(){

      String Name = table.insert("Hello");
      String DOB = table.insert("10/30/2000");
      Striing School = table.insert("None");
      int School_ID = table.insert(1333);
      double Hours = table.insert(3.4);
      String  Phone_Num = table.insert("(831)444-222");



        table.update(Name, "Hello");

        String data = table.get(Name);

        assertNotNull(data);
        assertTrue(data.equals("Hello"));
    }
}
