# **API For Study Guide APP**
Study Guide APP Api with user Authentication

**baseUrl** = http://157.245.141.138/api

**Headers**

Authorization Header only need for authentication request

```
{
   "Accept": "application/json",
   "Authorization": "Bearer + token"
}
```

# **Navigation**
* [Sign Up](#sign-up)
* [Login](#login)
* [Search School](#search-school)
* [Single School](#single-school)
* [Search Professor](#search-professor)
* [Single Professor](#single-professor)
* [School Departments](#school-departments)
* [Rate Professor](#rate-professor)
* [Professor Upload Documents](#professor-upload-documents)
* [Professor Study Data](#professor-study-data)
* [Delete Document](#delete-document)
* [Profile Update](#profile-update)
* [States Listing](#states-listing)




**Search School**
----
  Api For Searching School.

* **URL**

  /schools/search

* **Method:**

  `GET`
  
*  **URL Params**
  
   `query=[string]`
        
        OR

   `location=[string]`
    
   
* **Data Params**

   **Required:**

    None

    **Optional:**

    None

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "schools": [
            {
                "id": 24,
                "school_id": 675,
                "school_name": "New York University",
                "type": "RatemyprofessorItem",
                "school_location": "New York, NY",
                "school_total_top_professors": 3,
                "created_at": "2019-04-30 02:09:03",
                "updated_at": "2019-04-30 02:09:03"
            },
            {
                "id": 228,
                "school_id": 5585,
                "school_name": "Metropolitan College of New York",
                "type": "RatemyprofessorItem",
                "school_location": "New York, NY",
                "school_total_top_professors": 3,
                "created_at": "2019-04-30 02:09:15",
                "updated_at": "2019-04-30 02:09:15"
            },
            {
                "id": 265,
                "school_id": 5751,
                "school_name": "New York University- School of Social Work",
                "type": "RatemyprofessorItem",
                "school_location": "New York, NY",
                "school_total_top_professors": 3,
                "created_at": "2019-04-30 02:09:17",
                "updated_at": "2019-04-30 02:09:17"
            },
            {
                "id": 440,
                "school_id": 4887,
                "school_name": "New York College of Osteopathic Medicine",
                "type": "RatemyprofessorItem",
                "school_location": "Old Westbury, NY",
                "school_total_top_professors": 3,
                "created_at": "2019-04-30 02:09:22",
                "updated_at": "2019-04-30 02:09:22"
            },
            {
                "id": 490,
                "school_id": 15336,
                "school_name": "New York Institute of Technology",
                "type": "RatemyprofessorItem",
                "school_location": "Vancouver, BC",
                "school_total_top_professors": 1,
                "created_at": "2019-04-30 02:09:23",
                "updated_at": "2019-04-30 02:09:23"
            },
            {
                "id": 526,
                "school_id": 17171,
                "school_name": "New York School of Design",
                "type": "RatemyprofessorItem",
                "school_location": "New York, NY",
                "school_total_top_professors": 3,
                "created_at": "2019-04-30 02:09:23",
                "updated_at": "2019-04-30 02:09:23"
            },
            {
                "id": 945,
                "school_id": 17580,
                "school_name": "New York University Graduate School of Art and Science",
                "type": "RatemyprofessorItem",
                "school_location": "New York, NY",
                "school_total_top_professors": 1,
                "created_at": "2019-04-30 02:09:26",
                "updated_at": "2019-04-30 02:09:26"
            },
            {
                "id": 952,
                "school_id": 17635,
                "school_name": "The New York School for Medical and Dental Assistants",
                "type": "RatemyprofessorItem",
                "school_location": "Queens, NY",
                "school_total_top_professors": 0,
                "created_at": "2019-04-30 02:09:26",
                "updated_at": "2019-04-30 02:09:26"
            },
            {
                "id": 956,
                "school_id": 17664,
                "school_name": "New York Automotive Diesel Institute",
                "type": "RatemyprofessorItem",
                "school_location": "Jamaica, NY",
                "school_total_top_professors": 0,
                "created_at": "2019-04-30 02:09:26",
                "updated_at": "2019-04-30 02:09:26"
            },
            {
                "id": 977,
                "school_id": 17609,
                "school_name": "Mildred Elley - New York City Metro",
                "type": "RatemyprofessorItem",
                "school_location": "Manhattan, NY",
                "school_total_top_professors": 3,
                "created_at": "2019-04-30 02:09:26",
                "updated_at": "2019-04-30 02:09:26"
            },
            {
                "id": 1009,
                "school_id": 17714,
                "school_name": "The Business, Finance and Management School of New York",
                "type": "RatemyprofessorItem",
                "school_location": "New York, NY",
                "school_total_top_professors": 0,
                "created_at": "2019-04-30 02:09:26",
                "updated_at": "2019-04-30 02:09:26"
            },
            {
                "id": 1276,
                "school_id": 17227,
                "school_name": "State University of New York College of Environmental Science and Forestry",
                "type": "RatemyprofessorItem",
                "school_location": "Syracuse, NY",
                "school_total_top_professors": 2,
                "created_at": "2019-04-30 02:09:27",
                "updated_at": "2019-04-30 02:09:27"
            },
            {
                "id": 1280,
                "school_id": 17148,
                "school_name": "New York Institute of Finance",
                "type": "RatemyprofessorItem",
                "school_location": "New York, NY",
                "school_total_top_professors": 0,
                "created_at": "2019-04-30 02:09:27",
                "updated_at": "2019-04-30 02:09:27"
            },
            {
                "id": 1602,
                "school_id": 15464,
                "school_name": "New York College of Traditional Chinese Medicine",
                "type": "RatemyprofessorItem",
                "school_location": "Mineola, NY",
                "school_total_top_professors": 1,
                "created_at": "2019-04-30 02:09:28",
                "updated_at": "2019-04-30 02:09:28"
            },
            {
                "id": 1787,
                "school_id": 14487,
                "school_name": "New York Studio Residency Program",
                "type": "RatemyprofessorItem",
                "school_location": "New York, NY",
                "school_total_top_professors": 0,
                "created_at": "2019-04-30 02:09:28",
                "updated_at": "2019-04-30 02:09:28"
            },
            {
                "id": 2499,
                "school_id": 5165,
                "school_name": "New York University College of Dentistry",
                "type": "RatemyprofessorItem",
                "school_location": "New York, NY",
                "school_total_top_professors": 3,
                "created_at": "2019-04-30 02:09:33",
                "updated_at": "2019-04-30 02:09:33"
            },
            {
                "id": 2718,
                "school_id": 2306,
                "school_name": "Katharine Gibbs School: New York",
                "type": "RatemyprofessorItem",
                "school_location": "New York, NY",
                "school_total_top_professors": 3,
                "created_at": "2019-04-30 02:09:36",
                "updated_at": "2019-04-30 02:09:36"
            },
            {
                "id": 2993,
                "school_id": 16542,
                "school_name": "New York Medical Career Training Center",
                "type": "RatemyprofessorItem",
                "school_location": "New York, NY",
                "school_total_top_professors": 1,
                "created_at": "2019-04-30 02:09:38",
                "updated_at": "2019-04-30 02:09:38"
            },
            {
                "id": 3174,
                "school_id": 13981,
                "school_name": "New York Institute of Beauty",
                "type": "RatemyprofessorItem",
                "school_location": "Syosset-Islandia, New York, NY",
                "school_total_top_professors": 3,
                "created_at": "2019-04-30 02:09:39",
                "updated_at": "2019-04-30 02:09:39"
            },
            {
                "id": 3287,
                "school_id": 12295,
                "school_name": "New York University - London",
                "type": "RatemyprofessorItem",
                "school_location": "Bloomsbury, London, LONDON",
                "school_total_top_professors": 3,
                "created_at": "2019-04-30 02:09:41",
                "updated_at": "2019-04-30 02:09:41"
            },
            {
                "id": 3362,
                "school_id": 5740,
                "school_name": "New York Institute of Technology",
                "type": "RatemyprofessorItem",
                "school_location": "Central Islip, NY",
                "school_total_top_professors": 3,
                "created_at": "2019-04-30 02:09:41",
                "updated_at": "2019-04-30 02:09:41"
            }
        ],
        "message": "Schools Record fetched successfully.",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**
  
  None

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/school/search",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**Sign Up**
----
  Create a new User.

* **URL**

  /register

* **Method:**

  `POST`
  
*  **URL Params**
  
  None

* **Data Params**

   **Required:**
 
   `school_id=[integer]`

   `first_name=[string]`

   `last_name=[string]`

   `email=[string]`

   `password=[string]`

   `image=[file/image]`

    **Optional:**
 
    None

* **Success Response:**

  * **Code:** 201 <br />
    ```javascript
    {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9zdHVkeS1ndWlkZS1hcHAudGVzdFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTU1NjgxNDk4MywibmJmIjoxNTU2ODE0OTgzLCJqdGkiOiJPRkVPaTB3MUpBQVlzY0VHIiwic3ViIjo0ODgzLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.oZc8120k1zNN0x5-jFoATMaltMjmU565pgrxiwNazEA",
        "user": {
            "id": 4883,
            "professor_id": null,
            "school_id": 1,
            "name": "Suleman Khan",
            "email": "sulemankk9ssss7@gmail.com",
            "email_verified_at": null,
            "image": "http://study-guide-app.test/image/nH2V6KyRxIniv1OBoV9eUwK39oiBAja3mJL1exKy.png",
            "total_reviews": 0,
            "rate": 0,
            "is_able_to_login": 1,
            "created_at": "2019-05-02 16:36:23",
            "updated_at": "2019-05-02 16:36:23"
        },
        "message": "User Has been created",
        "status": "success",
        "code": 201
    }
    ``` 
* **Error Response:**

  * **Code:** 422 Unprocessable Entity <br />
    ```javascript
    {
        "message": "The email has already been taken.",
        "code": 422,
        "status": "error"
    }
    ``` 

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/register",
      dataType: "json",
      type : "POST",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**Login**
----
  Login your Api.

* **URL**

  /login

* **Method:**

  `POST`
  
*  **URL Params**
  
  None

* **Data Params**

   **Required:**
 
   `email=[string]`

   `password=[string]`

    **Optional:**
 
    None

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9zdHVkeS1ndWlkZS1hcHAudGVzdFwvYXBpXC9sb2dpbiIsImlhdCI6MTU1NjgxNDk0NSwibmJmIjoxNTU2ODE0OTQ1LCJqdGkiOiJTamlQWWJWa0ljZGdXajhNIiwic3ViIjo0ODgxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.obuSXr_er6p4Am61sBOpFWzA8sI9BOu1mnf_2iE2vVc",
        "user": {
            "id": 4881,
            "professor_id": null,
            "school_id": 1,
            "name": "Suleman Khan",
            "email": "sulemankk97@gmail.com",
            "email_verified_at": null,
            "image": "http://study-guide-app.test/image/7pQOVkJjx0s6Cupoe1cKlzC4CHqUO4FXF97hqBMX.jpeg",
            "total_reviews": 0,
            "rate": 0,
            "is_able_to_login": 1,
            "created_at": "2019-05-02 14:44:22",
            "updated_at": "2019-05-02 14:44:22"
        },
        "message": "User Login Successfully",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**

  * **Code:** 401 Unauthorized <br />
    ```javascript
    {
        "message": "Unauthorized",
        "status": "error",
        "code": 401
    }
    ``` 

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/login",
      dataType: "json",
      type : "POST",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**Single School**
----
  Get Single School.

* **URL**

  /schools/{schoolID}

* **Method:**

  `GET`
  
*  **URL Params**
  
   `id=[integer]`

* **Data Params**

    None

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "school": {
            "id": 2,
            "school_id": 758,
            "school_name": "Pennsylvania State University",
            "type": "RatemyprofessorItem",
            "school_location": "University Park, PA",
            "school_total_top_professors": 3,
            "created_at": "2019-05-01 09:45:53",
            "updated_at": "2019-05-01 09:45:53",
            "professors": [
                {
                    "id": 4,
                    "professor_id": 2283274,
                    "school_id": 2,
                    "name": "Brandon    Schwartz",
                    "email": null,
                    "email_verified_at": null,
                    "image": "http://www.ratemyprofessors.com/None",
                    "total_reviews": 60,
                    "rate": 5,
                    "is_able_to_login": 0,
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 5,
                    "professor_id": 1712140,
                    "school_id": 2,
                    "name": "Allen    Muir",
                    "email": null,
                    "email_verified_at": null,
                    "image": "http://www.ratemyprofessors.com/None",
                    "total_reviews": 47,
                    "rate": 5,
                    "is_able_to_login": 0,
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 6,
                    "professor_id": 2458349,
                    "school_id": 2,
                    "name": "Rishab    Gulati",
                    "email": null,
                    "email_verified_at": null,
                    "image": "http://www.ratemyprofessors.com/None",
                    "total_reviews": 40,
                    "rate": 5,
                    "is_able_to_login": 0,
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                }
            ]
        },
        "message": "Get Single School",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**

  * **Code:** 401 Unauthorized <br />
    ```javascript
    {
        "message": "Unauthorized",
        "status": "error",
        "code": 401
    }
    ``` 

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/schools/{schoolID}",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**School Departments**
----
  Get School Departments.

* **URL**

  /schools/{schoolID}/departments

* **Method:**

  `GET`
  
*  **URL Params**
  
   `id=[integer]`

* **Data Params**

    None

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "school_departments": [
            {
                "id": 33,
                "name": "Business department"
            },
            {
                "id": 106,
                "name": "History department"
            },
            {
                "id": 78,
                "name": "Engineering department"
            }
        ],
        "message": "Get School Departments",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**

  * **Code:** 401 Unauthorized <br />
    ```javascript
    {
        "message": "Unauthorized",
        "status": "error",
        "code": 401
    }
    ``` 

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/schools/{schoolID}",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**Search Professor**
----
  Search Professor.

* **URL**

  /professors/search

* **Method:**

  `GET`
  
*  **URL Params**

   **Search By Name Parameters**
   
   `by_name=1`

   `school_id=[integer]`

   `professor_name=[string]`

   **Search By School Parameters**
   
   `by_school=1`

   `school_id=[integer]`

   `department_name=[string]`

* **Data Params**

    None

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "professors": [
            {
                "id": 77,
                "professor_id": 811644,
                "school_id": 26,
                "name": "Allison    Wade",
                "email": null,
                "email_verified_at": null,
                "image": "http://www.ratemyprofessors.com/None",
                "department": "ychology department",
                "total_reviews": 51,
                "rate": 5,
                "is_able_to_login": 0,
                "created_at": "2019-05-03 17:26:52",
                "updated_at": "2019-05-03 17:26:52"
            }
        ],
        "message": "Professors Record fetched successfully.",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**

  * **Code:** 401 Unauthorized <br />
    ```javascript
    {
        "message": "Unauthorized",
        "status": "error",
        "code": 401
    }
    ``` 

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/professors/search",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**Single Professor**
----
  Get Single Professor.

* **URL**

  /professors/{professorID}

* **Method:**

  `GET`
  
*  **URL Params**
  
   `id=[integer]`

* **Data Params**

    None

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "professor": {
            "id": 2,
            "professor_id": 1704064,
            "school_id": 1,
            "name": "Danielle    Kinsey",
            "email": null,
            "email_verified_at": null,
            "image": "http://www.ratemyprofessors.com/None",
            "total_reviews": 38,
            "rate": 5,
            "is_able_to_login": 0,
            "created_at": "2019-05-01 09:45:53",
            "updated_at": "2019-05-01 09:45:53",
            "ratings": [
                {
                    "id": 49,
                    "user_id": 2,
                    "name": "HIST3210",
                    "rating": 5,
                    "comment": "Good class, professor was amazing! The course was well structured for students to succeed. The professor also gives amazing feedback to improve on other assignments.",
                    "review_date": "2019-04-17",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 50,
                    "user_id": 2,
                    "name": "FYSM1405",
                    "rating": 5,
                    "comment": "My most favourite professor ever!!!!!! She is so funny and her lectures are the best and she made me want to go to class 2 times a week for the whole year! She is really caring and will help you with your assignments. The class was so fun and I learned so much too. Literally, Carleton's best professor, take all her classes. Dr. Kinsey is 100/10",
                    "review_date": "2018-11-10",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 51,
                    "user_id": 2,
                    "name": "FYSM1405B",
                    "rating": 5,
                    "comment": "Professor Kinsey has your back 1000% by perfectly blending academics and university resources like a superb cake. Her assignments are helpful for the rest of your academic career such as helping you know how to access primary sources. Overall, Professor Kinsey is the best, even better than Oprah and is a true blessing to have in your life!",
                    "review_date": "2018-05-14",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 52,
                    "user_id": 2,
                    "name": "FYSM1405B",
                    "rating": 5,
                    "comment": "Danielle Kinsey is an overall phenomenal professor. She creates an environment that is comfortable and where learning strangely enough becomes fun. Her deliverance of the content is amazing as she is very knowledgable. She is super hilarious so get ready to laugh. overall as long as you participate and do your readings you should be fine.",
                    "review_date": "2018-04-04",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 53,
                    "user_id": 2,
                    "name": "FYSM1405B",
                    "rating": 5,
                    "comment": "Best prof I had in first year. Lectures are always hilarious and interesting. She does assign quite a few papers, but is a generous grader and provides very good feedback.",
                    "review_date": "2018-04-03",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 54,
                    "user_id": 2,
                    "name": "HIST3120",
                    "rating": 5,
                    "comment": "I am a fourth year student, and my only regret thus far is not taking Danielle's class earlier! I've suffered through 3+ years of boring, dry history lectures by old white dudes, when I could have taken Prof. Kinsey's class!",
                    "review_date": "2018-01-16",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 55,
                    "user_id": 2,
                    "name": "HIST1707",
                    "rating": 5,
                    "comment": "If you go to class and listen, it's really hard to do badly. But she makes it easy because she's very engaged and has spot on humour.",
                    "review_date": "2017-03-14",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 56,
                    "user_id": 2,
                    "name": "HIST1001",
                    "rating": 5,
                    "comment": "SO AMAZING. Basically like watching stand up comedy but you get to learn at the same time. Ever see a chance to take a class with her? Do it. You will not regret.",
                    "review_date": "2016-12-15",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 57,
                    "user_id": 2,
                    "name": "HIST3120O",
                    "rating": 5,
                    "comment": "If you're debating taking hist of the body and aren't sure-do it. She is an amazing prof, and this course was one of my favs so far at Carleton. She's helpful and friendly if you email or visit her. The course is well laid out and easy to get a good grade so long as you do all the work. I hope I get to study under her again before I graduate!",
                    "review_date": "2015-12-11",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 58,
                    "user_id": 2,
                    "name": "HIST3120O",
                    "rating": 5,
                    "comment": "Do yourself a favour and take this class. It is so easy, the topics are easy and it is impossible to get a bad mark if you kind of pay attention and skim the readings. ",
                    "review_date": "2015-12-04",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 59,
                    "user_id": 2,
                    "name": "HIST1707",
                    "rating": 5,
                    "comment": "One of the best profs I had during my first year. Dr. Kinsey's manages to make her lectures very clear and organized while still making them interesting and even humorous. An awesome prof all around! ",
                    "review_date": "2015-05-11",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 60,
                    "user_id": 2,
                    "name": "HIST1707B",
                    "rating": 5,
                    "comment": "Doctor Kinsey is fantastic. I had her lectures at 8:30 am on Mondays, so it would take a pretty incredible professor for me to actually go, and she made the cut. She is clear, she makes her lectures interesting and humourous, and she really knows what she's talking about. I respect her enormously. ",
                    "review_date": "2015-01-20",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 61,
                    "user_id": 2,
                    "name": "HIST2910C",
                    "rating": 4.5,
                    "comment": "Danielle is a great teacher, shes clear and has interesting lectures. The only downside to the class was the PassFail reading assignments, i felt like although the books were interesting, I dont like spending 10-30$ per book for a pass fail assignment.  Overall, id for sure take a class by her again.",
                    "review_date": "2014-11-26",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 62,
                    "user_id": 2,
                    "name": "HIST1001",
                    "rating": 5,
                    "comment": "Prof. Kinsey is one of the best profs I've ever had! She lectures intelligently and in an organized manner so taking notes and following along is very easy. Looked forward to this class every week. Yes, there is a lot of reading, but that's a history course for you and she also picks great pop culture sources. Open to answering questions in class.",
                    "review_date": "2014-06-24",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 63,
                    "user_id": 2,
                    "name": "HIST1001A",
                    "rating": 5,
                    "comment": "I'm a science student and history was the class I looked forward to going to most this semester. She's incredibly funny, knowledgable, and helpful. Gives a good exam review. I would take another history class if she was the prof!",
                    "review_date": "2014-04-13",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 64,
                    "user_id": 2,
                    "name": "HIST1001A",
                    "rating": 5,
                    "comment": "Awesome Professor and a very energetic lecturer! Loved her classes and learned so much.",
                    "review_date": "2013-04-18",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 65,
                    "user_id": 2,
                    "name": "HIST4200",
                    "rating": 5,
                    "comment": "Fantastic professor who really wants her students to succeed.  Very clear in outlining her expectations, assigned interesting readings and a pertinent (if at times difficult) workload.  Learned a ton.  Great for a 4th-year seminar, if you have the opportunity.",
                    "review_date": "2012-04-28",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 66,
                    "user_id": 2,
                    "name": "HIST1001",
                    "rating": 5,
                    "comment": "Easy and helpful",
                    "review_date": "2012-04-06",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 67,
                    "user_id": 2,
                    "name": "HIST1001",
                    "rating": 5,
                    "comment": "Very good professor. I believe she is knew. She is funny and makes the class interesting. Also extremely nice and helpful to all the students.",
                    "review_date": "2012-03-28",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 68,
                    "user_id": 2,
                    "name": "HIST3210",
                    "rating": 5,
                    "comment": "Good class, professor was amazing! The course was well structured for students to succeed. The professor also gives amazing feedback to improve on other assignments.",
                    "review_date": "2019-04-17",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 69,
                    "user_id": 2,
                    "name": "FYSM1405",
                    "rating": 5,
                    "comment": "My most favourite professor ever!!!!!! She is so funny and her lectures are the best and she made me want to go to class 2 times a week for the whole year! She is really caring and will help you with your assignments. The class was so fun and I learned so much too. Literally, Carleton's best professor, take all her classes. Dr. Kinsey is 100/10",
                    "review_date": "2018-11-10",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 70,
                    "user_id": 2,
                    "name": "FYSM1405B",
                    "rating": 5,
                    "comment": "Professor Kinsey has your back 1000% by perfectly blending academics and university resources like a superb cake. Her assignments are helpful for the rest of your academic career such as helping you know how to access primary sources. Overall, Professor Kinsey is the best, even better than Oprah and is a true blessing to have in your life!",
                    "review_date": "2018-05-14",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 71,
                    "user_id": 2,
                    "name": "FYSM1405B",
                    "rating": 5,
                    "comment": "Danielle Kinsey is an overall phenomenal professor. She creates an environment that is comfortable and where learning strangely enough becomes fun. Her deliverance of the content is amazing as she is very knowledgable. She is super hilarious so get ready to laugh. overall as long as you participate and do your readings you should be fine.",
                    "review_date": "2018-04-04",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 72,
                    "user_id": 2,
                    "name": "FYSM1405B",
                    "rating": 5,
                    "comment": "Best prof I had in first year. Lectures are always hilarious and interesting. She does assign quite a few papers, but is a generous grader and provides very good feedback.",
                    "review_date": "2018-04-03",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 73,
                    "user_id": 2,
                    "name": "HIST3120",
                    "rating": 5,
                    "comment": "I am a fourth year student, and my only regret thus far is not taking Danielle's class earlier! I've suffered through 3+ years of boring, dry history lectures by old white dudes, when I could have taken Prof. Kinsey's class!",
                    "review_date": "2018-01-16",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 74,
                    "user_id": 2,
                    "name": "HIST1707",
                    "rating": 5,
                    "comment": "If you go to class and listen, it's really hard to do badly. But she makes it easy because she's very engaged and has spot on humour.",
                    "review_date": "2017-03-14",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 75,
                    "user_id": 2,
                    "name": "HIST1001",
                    "rating": 5,
                    "comment": "SO AMAZING. Basically like watching stand up comedy but you get to learn at the same time. Ever see a chance to take a class with her? Do it. You will not regret.",
                    "review_date": "2016-12-15",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 76,
                    "user_id": 2,
                    "name": "HIST3120O",
                    "rating": 5,
                    "comment": "If you're debating taking hist of the body and aren't sure-do it. She is an amazing prof, and this course was one of my favs so far at Carleton. She's helpful and friendly if you email or visit her. The course is well laid out and easy to get a good grade so long as you do all the work. I hope I get to study under her again before I graduate!",
                    "review_date": "2015-12-11",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 77,
                    "user_id": 2,
                    "name": "HIST3120O",
                    "rating": 5,
                    "comment": "Do yourself a favour and take this class. It is so easy, the topics are easy and it is impossible to get a bad mark if you kind of pay attention and skim the readings. ",
                    "review_date": "2015-12-04",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 78,
                    "user_id": 2,
                    "name": "HIST1707",
                    "rating": 5,
                    "comment": "One of the best profs I had during my first year. Dr. Kinsey's manages to make her lectures very clear and organized while still making them interesting and even humorous. An awesome prof all around! ",
                    "review_date": "2015-05-11",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 79,
                    "user_id": 2,
                    "name": "HIST1707B",
                    "rating": 5,
                    "comment": "Doctor Kinsey is fantastic. I had her lectures at 8:30 am on Mondays, so it would take a pretty incredible professor for me to actually go, and she made the cut. She is clear, she makes her lectures interesting and humourous, and she really knows what she's talking about. I respect her enormously. ",
                    "review_date": "2015-01-20",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 80,
                    "user_id": 2,
                    "name": "HIST2910C",
                    "rating": 4.5,
                    "comment": "Danielle is a great teacher, shes clear and has interesting lectures. The only downside to the class was the PassFail reading assignments, i felt like although the books were interesting, I dont like spending 10-30$ per book for a pass fail assignment.  Overall, id for sure take a class by her again.",
                    "review_date": "2014-11-26",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 81,
                    "user_id": 2,
                    "name": "HIST1001",
                    "rating": 5,
                    "comment": "Prof. Kinsey is one of the best profs I've ever had! She lectures intelligently and in an organized manner so taking notes and following along is very easy. Looked forward to this class every week. Yes, there is a lot of reading, but that's a history course for you and she also picks great pop culture sources. Open to answering questions in class.",
                    "review_date": "2014-06-24",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 82,
                    "user_id": 2,
                    "name": "HIST1001A",
                    "rating": 5,
                    "comment": "I'm a science student and history was the class I looked forward to going to most this semester. She's incredibly funny, knowledgable, and helpful. Gives a good exam review. I would take another history class if she was the prof!",
                    "review_date": "2014-04-13",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 83,
                    "user_id": 2,
                    "name": "HIST1001A",
                    "rating": 5,
                    "comment": "Awesome Professor and a very energetic lecturer! Loved her classes and learned so much.",
                    "review_date": "2013-04-18",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 84,
                    "user_id": 2,
                    "name": "HIST4200",
                    "rating": 5,
                    "comment": "Fantastic professor who really wants her students to succeed.  Very clear in outlining her expectations, assigned interesting readings and a pertinent (if at times difficult) workload.  Learned a ton.  Great for a 4th-year seminar, if you have the opportunity.",
                    "review_date": "2012-04-28",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 85,
                    "user_id": 2,
                    "name": "HIST1001",
                    "rating": 5,
                    "comment": "Easy and helpful",
                    "review_date": "2012-04-06",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                },
                {
                    "id": 86,
                    "user_id": 2,
                    "name": "HIST1001",
                    "rating": 5,
                    "comment": "Very good professor. I believe she is knew. She is funny and makes the class interesting. Also extremely nice and helpful to all the students.",
                    "review_date": "2012-03-28",
                    "created_at": "2019-05-01 09:45:53",
                    "updated_at": "2019-05-01 09:45:53"
                }
            ]
        },
        "message": "Get Single Professor",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**

  * **Code:** 401 Unauthorized <br />
    ```javascript
    {
        "message": "Unauthorized",
        "status": "error",
        "code": 401
    }
    ``` 

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/professors/{professorID}",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**Rate Professor**
----
  Rate Professor.

* **URL**

  /professors/rate

* **Method:**

  `POST`
  
*  **URL Params**

    None

* **Data Params**

   `professor_id=[integer]`

   `rating=[float]`

   `comment=[text]`
    

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "message": "Review has been submited Successfully.",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**

  * **Code:** 422 Unprocessable Entity <br />
    ```javascript
    {
        "message": "You already submitted a review for this professor.",
        "status": "error",
        "code": 422
    }
    ``` 
  * **Code:** 401 Unauthorized <br />
    ```javascript
    {
        "message": "Unauthorized",
        "status": "error",
        "code": 401
    }
    ``` 

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/professors/rate",
      dataType: "json",
      type : "POST",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**Delete Document**
----
  Delete Document Or Image.

* **URL**

  /documents/{documentID}

* **Method:**

  `DELETE`
  
*  **URL Params**

    `documentID=[integer]`

* **Data Params**

    None

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "message": "Document has been deleted.",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**

  * **Code:** 403 Forbidden <br />
    ```javascript
    {
        "message": "You are not authorized to delete this document.",
        "status": "error",
        "code": 403
    }
    ``` 
  * **Code:** 401 Unauthorized <br />
    ```javascript
    {
        "message": "Unauthorized",
        "status": "error",
        "code": 401
    }
    ``` 

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/professors/rate",
      dataType: "json",
      type : "POST",
      success : function(r) {
        console.log(r);
      }
    });
  ```
  
**Professor Upload Documents**
----
  Professor Upload Documents.

* **URL**

  /professors/upload

* **Method:**

  `POST`
  
*  **URL Params**

    None

* **Data Params**

   `published_to=[integer]`

   `documents=[array]`

   `documents[0][document]=[file] image or document`

   `documents[0][document_type]=[string] in image,document`
    

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "message": "Document has been uploaded successfully.",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**

  * **Code:** 422 Unprocessable Entity <br />
    ```javascript
    {   
        {
            "message": "The given data was invalid.",
            "errors": {
                "document": [
                    "The document field is required."
                ]
            }
        }
    }
    ``` 
  * **Code:** 401 Unauthorized <br />
    ```javascript
    {
        "message": "Unauthorized",
        "status": "error",
        "code": 401
    }
    ``` 
* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/professors/upload",
      dataType: "json",
      type : "POST",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**Professor Study Data**
----
  Professor Study Data.

* **URL**

  /professors/{professorID}/study-data

* **Method:**

  `GET`
  
*  **URL Params**

    `professorID=[integer]`

* **Data Params**

   None
    

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "documents": [
            {
                "document_name": "silhouette_forest_animals_129984_3840x2160.jpg",
                "document_type": "image",
                "document_size": "3.08 MB",
                "document": "http://study-guide-app.test/documents/silhouette-forest-animals-129984-3840x2160-1557039113.jpg",
                "created_at": "2019-05-05"
            },
            {
                "document_name": "cristina-gottardi-422394-unsplash.jpg",
                "document_type": "document",
                "document_size": "2.92 MB",
                "document": "http://study-guide-app.test/documents/cristina-gottardi-422394-unsplash-1557039113.jpg",
                "created_at": "2019-05-05"
            },
            {
                "document_name": "silhouette_forest_animals_129984_3840x2160.jpg",
                "document_type": "image",
                "document_size": "3.08 MB",
                "document": "http://study-guide-app.test/image/silhouette-forest-animals-129984-3840x2160-1557039199.jpg",
                "created_at": "2019-05-05"
            },
            {
                "document_name": "cristina-gottardi-422394-unsplash.jpg",
                "document_type": "document",
                "document_size": "2.92 MB",
                "document": "http://study-guide-app.test/documents/cristina-gottardi-422394-unsplash-1557039199.jpg",
                "created_at": "2019-05-05"
            },
            {
                "document_name": "silhouette_forest_animals_129984_3840x2160.jpg",
                "document_type": "image",
                "document_size": "3.08 MB",
                "document": "http://study-guide-app.test/image/silhouette-forest-animals-129984-3840x2160-1557039246.jpg",
                "created_at": "2019-05-05"
            },
            {
                "document_name": "code compelete.pdf",
                "document_type": "document",
                "document_size": "2.82 MB",
                "document": "http://study-guide-app.test/documents/code-compelete-1557039246.pdf",
                "created_at": "2019-05-05"
            }
        ],
        "message": "Document has been fetched successfully.",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**

  * **Code:** 401 Unauthorized <br />
    ```javascript
    {
        "message": "Unauthorized",
        "status": "error",
        "code": 401
    }
    ``` 

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/professors/study-data",
      dataType: "json",
      type : "POST",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**Profile Update**
----
  Profile Update.

* **URL**

  /professors/update-profile

* **Method:**

  `POST`
  
*  **URL Params**

   None

* **Data Params**

   `name=[string]`
        
        OR

   `image=[file]`

        OR

   `password=[string]`
    

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "message": "Your Profile has been updated successfully.",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**

  * **Code:** 401 Unauthorized <br />
    ```javascript
    {
        "message": "Unauthorized",
        "status": "error",
        "code": 401
    }
    ``` 

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/professors/study-data",
      dataType: "json",
      type : "POST",
      success : function(r) {
        console.log(r);
      }
    });
  ```
**States Listing**
----
  Get States Listing.

* **URL**

  /states

* **Method:**

  `GET`
  
*  **URL Params**
  
   None

* **Data Params**

    None

* **Success Response:**

  * **Code:** 200 <br />
    ```javascript
    {
        "states": [
            {
                "state": "vermont",
                "code": "vt"
            },
            {
                "state": "hawaii",
                "code": "hi"
            },
            {
                "state": "new",
                "code": "ny"
            },
            {
                "state": "georgia",
                "code": "ga"
            },
            {
                "state": "nevada",
                "code": "nv"
            },
            {
                "state": "tennessee",
                "code": "tn"
            },
            {
                "state": "nova",
                "code": "ns"
            },
            {
                "state": "california",
                "code": "ca"
            },
            {
                "state": "ontario",
                "code": "on"
            },
            {
                "state": "maine",
                "code": "me"
            },
            {
                "state": "oklahoma",
                "code": "ok"
            },
            {
                "state": "virginia",
                "code": "va"
            },
            {
                "state": "british",
                "code": "bc"
            },
            {
                "state": "michigan",
                "code": "mi"
            },
            {
                "state": "ohio",
                "code": "oh"
            },
            {
                "state": "london",
                "code": "london"
            },
            {
                "state": "iowa",
                "code": "ia"
            },
            {
                "state": "florida",
                "code": "fl"
            },
            {
                "state": "maryland",
                "code": "md"
            },
            {
                "state": "massachusetts",
                "code": "ma"
            },
            {
                "state": "south",
                "code": "sc"
            },
            {
                "state": "arkansas",
                "code": "ar"
            },
            {
                "state": "utah",
                "code": "ut"
            },
            {
                "state": "illinois",
                "code": "il"
            },
            {
                "state": "indiana",
                "code": "in"
            },
            {
                "state": "connecticut",
                "code": "ct"
            },
            {
                "state": "west",
                "code": "wv"
            },
            {
                "state": "quebec",
                "code": "qc"
            },
            {
                "state": "washington",
                "code": "dc"
            },
            {
                "state": "minnesota",
                "code": "mn"
            },
            {
                "state": "saskatchewan",
                "code": "sk"
            },
            {
                "state": "kentucky",
                "code": "ky"
            },
            {
                "state": "arizona",
                "code": "az"
            },
            {
                "state": "wisconsin",
                "code": "wi"
            },
            {
                "state": "missouri",
                "code": "mo"
            },
            {
                "state": "kansas",
                "code": "ks"
            },
            {
                "state": "oregon",
                "code": "or"
            },
            {
                "state": "mississippi",
                "code": "ms"
            },
            {
                "state": "louisiana",
                "code": "la"
            },
            {
                "state": "new",
                "code": "nh"
            },
            {
                "state": "alberta",
                "code": "ab"
            },
            {
                "state": "washington",
                "code": "wa"
            },
            {
                "state": "new",
                "code": "nj"
            },
            {
                "state": "new",
                "code": "nm"
            },
            {
                "state": "alabama",
                "code": "al"
            },
            {
                "state": "texas",
                "code": "tx"
            },
            {
                "state": "colorado",
                "code": "co"
            },
            {
                "state": "north",
                "code": "nc"
            },
            {
                "state": "pennsylvania",
                "code": "pa"
            },
            {
                "state": "nebraska",
                "code": "ne"
            }
        ],
        "message": "State Record fetched successfully.",
        "status": "success",
        "code": 200
    }
    ``` 
* **Error Response:**

  * **Code:** 401 Unauthorized <br />
    ```javascript
    {
        "message": "Unauthorized",
        "status": "error",
        "code": 401
    }
    ``` 

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/states",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```
