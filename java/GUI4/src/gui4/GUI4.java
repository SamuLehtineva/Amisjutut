/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui4;

/**
 *
 * @author samu.lehtineva
 */
public class GUI4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        try {
                GUI4jframe asia = new GUI4jframe();
            asia.setVisible(true);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    
}
