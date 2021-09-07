## User stories  
| ID | Story Description                                                                                                             | Priority    | Details                                                                 | Done  |  
|----|-------------------------------------------------------------------------------------------------------------------------------|-------------|-------------------------------------------------------------------------|--|  
| 1  | As GLaDOS, I can log in to the application                                                                                    | Must have   | Login requires username and password                                    | Yes |  
| 2  | As a Subject, I can log in to the application                                                                                 | Must have   | Login requires test subject ID and password                             | Yes |  
| 3  | As GLaDOS, I can edit the questions in the questionnaire                                                                      | Could have  |                                                                         |  |  
| 4  | As a Subject, I can submit testing data (questionnaires)                                                                      | Must have   | Must capture date,      Testing data based on stored testing parameters | Yes |  
| 5  | As GLaDOS, I can view all test subjects' data                                                                                 | Must have   |                                                                         | Yes |  
| 6  | As a Subject, I can only view my own testing data (historical   questionnaire submissions)                                    | Must have   |                                                                         | Yes |  
| 7  | As GLaDOS, I can ~~capture~~ register new test subjects                                                                       | Should have | Maximum of 10 subjects alive at once.                                   |  |  
| 8  | As GLaDOS, I can filter and sort test subjects based on their metadata                                                        | Should have |                                                                         |  |  
| 9  | As a facility manager, I can retrieve the Subject Number of the subject   that has submitted the most data and is still alive | Could have  | Must be via API with basic authorization                                |  |  
| 10 | As a facility manager, I can test the new testing management system (unit   tests)                                            | Could have  |                                                                         |  |  
| 11 | As a facility manager, I can deploy the new system in a docker container                                                      | Could have  |         


---
### Summary
I have spent around 5 hours on this one. The initial setup took a while because I don't create new projects too often. However, after that it is pretty straightforward. My estimation for completing all stories would be another 10 hours.

### Technology Used
Laravel

Vue

PostgreSQL

Tailwind CSS

### Setup Project
1. Clone project
2. Set up databases

`export PGPASSWORD=secret`

`psql -h localhost -U postgres << EOF`

    `CREATE DATABASE aperture_science_enrichment_centre WITH OWNER postgres;`
    
`EOF`

3. `composer install`
4. `npm install`
5. `php artisan migrate`
6. `npm run dev`
7. `php artisan serve`
