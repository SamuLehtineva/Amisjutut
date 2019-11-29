/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui2teht2;
import javax.swing.JFrame;
import java.awt.BorderLayout;
/**
 *
 * @author samu.lehtineva
 */
public class Gui2teht2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        try {
            gui2jframe asia = new gui2jframe();
            asia.setVisible(true);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    
}
