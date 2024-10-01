/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */

import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

/**
 *
 * @author bhuva
 */
@WebServlet(urlPatterns = {"/StudentSuggestionServlet"})
public class StudentSuggestionServlet extends HttpServlet {
    
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            String[] students = {"Alice", "Bob", "Charlie", "David", "Eva", "Fiona", "George", "Hannah", "Ivy", "Jack", "Karen","Lavanya","Mano","Nithi","Oviya","Patrick","Queen","Raksh"};
            String query = request.getParameter("query");
            
            // Check if query is not null or empty
            if (query != null && !query.isEmpty()) {
                for (String student : students) {
                    // If student name starts with the entered query (case-insensitive)
                    if (student.toLowerCase().startsWith(query.toLowerCase())) {
                        // Output matching names wrapped in divs
                        out.println("<div onclick='selectSuggestion(\"" + student + "\")'>" + student + "</div>");
                    }
                }
            }
        }
            }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
  
   

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
