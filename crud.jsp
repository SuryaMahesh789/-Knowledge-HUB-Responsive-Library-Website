
<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1" %>
<%@ page import="java.sql.*" %>
<%@page import="java.sql.*,java.util.*,pageNumber.*, java.util.List" %>
<%@page import="org.apache.catalina.Session" %>

<% 

if(request.getParameter("submit")!=null)
{
    String name=request.getParameter("sname");
    String course=request.getParameter("course");
    String fee=request.getParameter("fee");

 
    Connection con;
    PreparedStatement pst;
    ResultSet rs;

    Class.forName("com.mysql.jdbc.Driver");
    con = DriverManager.getConnection("jdbc:mysql://localhost/school","root","");
    pst = con.prepareStatement("insert into records(sname,course,fee)values(?,?,?)");


    pst.setString(1,name);
    pst.setString(2,course);
    pst.setString(3,fee);


    pst.executeUpdate();
    %>

    <script>

        alert("Record Added Successfully...");

    </script>



<%

    
}


%>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CRUD Operations JSP</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


</head>
<body>

<h1>Student Registration System CRUD Using JSP</h1>

<div class="row">
    <div class="col-sm-4">
        <form method="POST" action="#">

            <div alight="left">
                <label class="form-label">Student Name</label>
                <input type="text" class="form-control" placeholder="Student Name" name="sname" id="sname" required>
            </div>

            <div alight="left">
                <label class="form-label">Course</label>
                <input type="text" class="form-control" placeholder="Course" name="course" id="course" required>
            </div>

            <div alight="left">
                <label class="form-label">Fee</label>
                <input type="text" class="form-control" placeholder="Fee" name="fee" id="fee" required>
            </div>
            </br>

            <div alight="right">
                <input type="submit" id="submit" value="submit" name="submit" class="btn btn-info">
                <input type="reset" id="reset" value="reset" name="reset" class="btn btn-warning">
            </div>

        </form>
    </div>


    <div class="col-sm-8">
        <div class="panel-body">
            <table id="tbl-student" class="table table-responsive table-bordered" cellpadding="0" width="100%">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Fee</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <%

                    Connection con;
                    PreparedStatement pst;
                    ResultSet rs;

                    Class.forName("com.mysql.jdbc.Driver");
                    con = DriverManager.getConnection("jdbc:mysql://localhost/school","root","");
                    String query="select * from records";
                    Statement st=con.createStatement();
                    

                    rs = st.executeQuery(query);

                    while(rs.next())
                    {
                        String id=rs.getString("id");


                    %>


                    <tr>
                        <td> <%=rs.getString("sname") %></td>
                        <td> <%=rs.getString("course") %></td>
                        <td> <%=rs.getString("fee") %></td>
                        <td><a href="update.jsp?id=<%=id%>">Edit</a></td>
                        <td><a href="delete.jsp?id=<%=id%>">Delete</a></td>
                    </tr>

                    <%

                        }

                    %>

                </thead>
            </table>
        </div>
        
    </div>


</div>


<script>

</script>
</body>
</html>
