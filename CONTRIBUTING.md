# Contributing

First of all thank you for considering to contribute.

Individuals making significant and valuable contributions are made Collaborators and given commit-access to the project.

> [!IMPORTANT]
>
> This project uses GitHub Issues to track bugs and feature requests.
>
> Please search the existing issues before filing new issues to avoid duplicates.

---

## Step 1: Fork the Project

Fork the project on GitHub and check out your copy locally.

## Step 2: Clone the repository

```bash
git clone git@github.com:ghostwriter/atprotocol.git
cd atprotocol
git remote add upstream git://github.com/ghostwriter/atprotocol.git
```

# Step 3: Branch

Create a feature branch and start hacking:

```bash
git checkout -b my-feature-branch -t origin/main
```

## Step 4: Commit

Make sure git knows your name and email address:

```bash
git config --global user.name "name"
git config --global user.email "email@example.com"
git commit --signoff --message "Add my feature"
```

### Step 5: Rebase

Use git rebase (not git merge) to sync your work from time to time.

```bash
git fetch upstream

git rebase upstream/main
```

## Step 6: Test

Bug fixes and features should come with tests. Add your tests in the `tests` directory.

```bash
composer test
```

## Step 7: Push

```bash
git push origin my-feature-branch
```
