/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package harj6teht5;

/**
 *
 * @author samu.lehtineva
 */
public class Harj6teht5 {

    /**
     * @param args the command line arguments
     */
    private static String aliohjelma(String a) {
        String salattu = "";
        for (int i = 0; i < a.length(); i++) {
            char merkki = a.charAt(i);
            merkki++;
            salattu = salattu + merkki;
	}
		
        System.out.println("Salattu:" + salattu);
        return(salattu);
}
    private static String aliohjelma2(String d) {
        String purettu = "";
        for (int i = 0; i < d.length(); i++) {
            char merkki = d.charAt(i);
            merkki--;
            purettu = purettu + merkki;
	}
		
        System.out.println("Salattu:" + purettu);
        return(d);
    }
    public static void main(String[] args) {
        String b = aliohjelma("Huomenta");
        System.out.print("Anna purettava salaviesti: ");
        String teksti1 = Reader.readString();
        String c = aliohjelma2(teksti1);
    }
    
}
