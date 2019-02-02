import java.util.*;

// Java program for testing parser used in web app
public class LinkParser{
    ArrayList <String> links = new ArrayList<String>();

    public static void main(String main[]){
        System.out.println("Testing Program for Web App");

        new LinkParser();
    }

    public LinkParser(){
        Scanner in = new Scanner(System.in);

        System.out.println("Select function to test;");
        System.out.println("A -> Split");
        System.out.println("B -> Join");
        
        String choice = in.nextLine();
        if(choice == 'A' || choice == 'a') breakDown();
        else buildString();

        
    }

    private void breakDown(){
        String allLinks = "";
        Scanner in = new Scanner(System.in);

        System.out.println("Enter string to break (separated by $,#)");
        allLinks = in.nextLine();
        
        // Iterate through string 
        String currLink = "";
        for (int i = 0; i < allLinks.length(); i++) { // (; char c : allLinks.toCharArray()) i++ works too   
            char c = allLinks.charAt(i);
            if(c == '#' || c == '$' || i == allLinks.length() - 1){
                links.add(currLink);
                currLink = "";
            } else currLink = currLink + c;

            
        }

        // Print out links
        System.out.printf("\nLinks:\n");
        for (String link : links) {
            System.out.printf("%s \n", link);
        }
        
    }

    public void buildString(){
        
    }
}