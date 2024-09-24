<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interviewer Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
    <div class="container mt-5">
        <h2 class="text-center">Interviewer Profile</h2>
        <div class="card mt-4">
            <div class="card-body">
                <form id="updateProfileForm" action="updateprofile.php" method="POST">
                    <!-- Interviewer Name -->
                    <div class="mb-3">
                        <label for="interviewerName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="interviewerName" name="interviewerName" value="John Doe" required>
                    </div>

                    <!-- Interviewer Email -->
                    <div class="mb-3">
                        <label for="interviewerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="interviewerEmail" name="interviewerEmail" value="johndoe@example.com" required>
                    </div>

                    <!-- Interviewer Phone -->
                    <div class="mb-3">
                        <label for="interviewerPhone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="interviewerPhone" name="interviewerPhone" value="+123456789" required>
                    </div>

                    <!-- Interviewer Bio -->
                    <div class="mb-3">
                        <label for="interviewerBio" class="form-label">Bio</label>
                        <textarea class="form-control" id="interviewerBio" name="interviewerBio" rows="3">Experienced interviewer with 10 years of experience in technical recruiting.</textarea>
                    </div>

                    <!-- Update Button -->
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

