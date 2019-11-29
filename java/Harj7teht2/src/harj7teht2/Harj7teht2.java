/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj7teht2;

/**
 *
 * @author samu.lehtineva
 */
public class Harj7teht2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Anna etunimesi");
        String asia1 = Reader.readString();
        
        System.out.println("Anna sukunimesi");
        String asia2 = Reader.readString();
        
        System.out.println("Anna puhelinnumerosi");
        int asia3 = Reader.readInt();
        
        System.out.println("INSERT INTO asiakkaat (etunimi,sukunimi,puhelin)\nVALUES (\'"+asia1+"\',\'"+asia2+"\',\'"+asia3+"\');");
        System.out.println("select puhelin FROM asiakkaat\nWHERE ETUNIMI=\'"+asia1+"\' AND SUKUNIMI=\'"+asia2+"\';");
    }
    
}
