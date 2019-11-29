/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj7teht4;

/**
 *
 * @author samu.lehtineva
 */
public class Harj7teht4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        String asia1 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mi erat, pellentesque in congue in, vehicula vitae tellus.";
        System.out.println("Anna alku: ");
        int asia2 = Reader.readInt();
        System.out.println("Anna loppu: ");
        int asia3 = Reader.readInt();
        String asia4 = asia1.substring(asia2,asia3);
        System.out.println(asia4);
    }
    
}
